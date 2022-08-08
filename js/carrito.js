'use strict'

var carrito = new function(){

	this.items = {}

	this.agregarItem = function(id,cat){
		$.post('carrito/carrito.php',{
			task: 'datos_paquete',
			id: id,
			cat: cat,
		}, (function(resp){
			this.items[resp.id] = new Item(resp);
			this.refresh();
		}).bind(carrito), 'json')
	}

	this.borrarItem = function(id){
		delete this.items[id];
		this.refresh();
		this.updateTotals();
	}

	this.refresh = function (){
		this.tableItems.html('');
		var html = '';
		if(Object.keys(this.items).length){
			for( var k in this.items){
				if(!this.items.hasOwnProperty(k)) return
				var item = this.items[k];
				if(Number(item.tiene_transporte) == 1){
					if(item.transporte){
						var texto_transporte = '<div class="checkbox"><input name="transporte" type="checkbox" data-item-id="'+ item.id +'" checked></div>';
					}else{
						var texto_transporte = '<div class="checkbox"><input name="transporte" type="checkbox" data-item-id="'+ item.id +'"></div>';
					}
				}else if(Number(item.tiene_transporte) == 2){
					item.transporte = true;
					var texto_transporte = '<div class="checkbox"><label><input name="transporte" type="checkbox" data-item-id="'+ item.id +'" checked disabled> (Incluido)</label></div>';
				}else{
					var texto_transporte = '--';
				}
				var precio_transporte = (Number(item.tiene_transporte)) ? item.precio_transporte : '--';
				html += [
					'<tr data-item-id="'+item.id+'">',
						// '<td><label>'+item.nombre+'</label></td>',
						'<td><label>'+item.titulo+'</label></td>',
						'<td><input name="cantidad" data-item-id="'+item.id+'" type="number" class="qty col-md-2" value="'+item.cantidad+'"></td>',
						'<td><input name="fecha" data-item-id="'+item.id+'" type="input" class="fecha" placeholder="dd/mm/yyyy" value="'+item.fecha+'"></td>',
						'<td>'+ texto_transporte +'</td>',
						'<td><label>'+ precio_transporte +'</label></td>',
						'<td><label>'+ item.precio +'</label></td>',
						'<td><label><span class="subtotal" data-item-id="'+item.id+'"></span></label></td>',
						'<td><a class="borrar-item" href="#" data-item-id="'+item.id+'"><span class="fa fa-trash"></span></a></td>',
						'<td><label>'+ item.categoria +'</label></td>',
						// '<td style="display:none;"><label>'+ item.categoria +'</label></td>',
					'</tr>'
				].join('');
			};
		}else{
			html = '<tr><td colspan=8><div class="col-md-12 text-center">No hay items en su carrito!</div><div class="col-md-12"><button type="button" class="btn btn-primary" data-dismiss="modal">Seguir comprando</button></div></td></tr>'
		}
		this.tableItems.html(html);
		$('.fecha').datepicker({
			format: 'dd/mm/yyyy',
			startDate: '+2d',
		});
		setTimeout(100,this.updateTotals());
	}

	this.changeCantidad = function(id, input){
		if($(input).val() < 1) $(input).val(1);
		this.items[id].cantidad = $(input).val();
		this.updateTotals();
	}

	this.changeFecha = function(id, input){
		var f = $(input).val().split('/');
		var d = new Date(f[2],f[1]-1,f[0]);
		if(d instanceof Date && !isNaN(d.getTime()))
			this.items[id].fecha = f.join('/');
		this.updateTotals();
	}

	this.changeTransporte = function(id, input){
		this.items[id].transporte = $(input).prop('checked');
		this.updateTotals(id);
	}

	this.updateTotals = function(id){
		var subtotal = this.tableItems.find('tr[data-item-id] span.subtotal')
		if(!subtotal.length) return;
		var total = 0;
		$.each(subtotal,function(k,v){
			var id = $(v).data('item-id');
			var item = carrito.items[id];
			var precio = item.cantidad * item.precio
			if(item.transporte) precio += item.cantidad * item.precio_transporte;
			total += precio;
			$(v).text(Number(precio).toFixed(2));
		})
		$('table tfoot th.price-total').text(total.toFixed(2));
		$('.modal-carrito .modal-footer .procesar-carrito').attr('data-total',total.toFixed(2));
	}

	this.tableItems = $('.modal-carrito .table-items tbody');

	var modalCarrito = $('.modal-carrito');

	var Item = function(itemObj){
		this.id = itemObj.id;
		// this.nombre = itemObj.nombre;
		this.titulo = itemObj.titulo;
		this.precio = itemObj.precio;
		var fecha = new Date(Date.now()+(1000*60*60*48));
		this.fecha = fecha.getDate()+'/'+(Number(fecha.getMonth())+1)+'/'+fecha.getFullYear();
		this.cantidad = 1;
		this.tiene_transporte = (itemObj.tiene_transporte);
		this.precio_transporte = itemObj.precio_transporte;
		this.transporte = false;
		this.categoria = itemObj.categoria;
		return this;
	}

}


//ev listeners
// $('body').on('click','.agregar-paquete',function(ev){
$('#modal_info').on('click','.agregar-paquete',function(ev){
	$('.modal-carrito').modal('show',this);
})

$('.modal-carrito').on('show.bs.modal',function(ev){
	if(ev.relatedTarget){
		$('.procesar-carrito').show();
		var id = $(ev.relatedTarget).data('id');
		var cat = $(ev.relatedTarget).data('cat');
		if(!id) return;
		if(!!carrito.items[id]){
			// carrito.refresh()
			carrito.agregarItem(id,cat)
		}else{
			carrito.agregarItem(id,cat)
		};
	}else{
		carrito.refresh();
	}
})

$('.modal-carrito').on('change', 'input', function(ev){
	var id = $(this).data('item-id');
	switch (this.name) {
		case 'cantidad':
			carrito.changeCantidad(id, this);
			break;
		case 'fecha':
			carrito.changeFecha(id, this);
			break;
		case 'transporte':
			carrito.changeTransporte(id, this);
			break;
	}
})

$('.modal-carrito').on('click', 'a.borrar-item', function(ev){
	ev.preventDefault();
	var id = $(this).data('item-id');
	carrito.borrarItem(id);
})

$('.procesar-carrito').on('click',function(ev){
	ev.preventDefault();
	$(this).prop('disabled');
	var total = $(this).attr('data-total');
	var laddaButton = Ladda.create(this);
	laddaButton.start();
	$.post('carrito/carrito.php',{
			task: 'url_pago',
			data: {data:carrito.items, total:total},
		},
		function(resp){
			if(resp.todoOk){
				laddaButton.stop();
				$('.procesar-carrito').hide();
				$('.modal-carrito .modal-body').html([
					'<div class="text-center row">',
						'<div class="col-md-6">',
							'<a href="'+resp.mp_url+'">',
								'<img target="_self" src="images/mercadopago-logo.svg" height="142px">',
							'</a>',
						'</div>',
						'<div class="col-md-6">',
							'<a href="'+resp.pp_url+'">',
								'<img target="_self" src="images/paypal-logo.jpg" height="142px">',
							'</a>',
						'</div>',
					'</div>',
				].join(''))
				// window.location.href = resp.url;
			}
		}
	);
})
