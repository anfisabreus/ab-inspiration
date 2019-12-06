(function() {
    tinymce.create('tinymce.plugins.list', {
        init : function(ed, url) {
            ed.addButton('list_mce_button', {
            text: 'Списки',
                title : 'Списки',
                type: 'menubutton',
                onclick : function() {
                
                
                ed.windowManager.open( {
									title: 'Оформление маркированного списка',
									width: jQuery( window ).width() * 0.5,
					// minus head and foot of dialog box
					height: (jQuery( window ).height() - 36 - 50) * 0.3,
					inline: 1,
									body: [
									{
											type: 'listbox',
											name: 'listboxName',
											label: 'Стиль буллетов',
											'values': [
												{text: 'Галочка (list1)', value: 'list1'},
												{text: 'Галочка в цветном квадрате (list2)', value: 'list2'},
												{text: 'Галочка в белом квадрате (list3)', value: 'list3'},
												{text: 'Галочка в цветном круге (list4)', value: 'list4'},
												{text: 'Галочка в белом круге (list5)', value: 'list5'},
												{text: 'Цветная точка (list6)', value: 'list6'},
												{text: 'Белая точка (list7)', value: 'list7'},
												{text: 'Цветной квадрат (list8)', value: 'list8'},
												{text: 'Белый квадрат (list9)', value: 'list9'},
												{text: 'Плюс (list10)', value: 'list10'},
												{text: 'Плюс в цветном круге (list11)', value: 'list11'},
												{text: 'Плюс в цветном квадрате (list12)', value: 'list12'},
												{text: 'Плюс в белом квадрате (list13)', value: 'list13'},
												{text: 'Минус (list14)', value: 'list14'},
												{text: 'Минус в цветном круге (list15)', value: 'list15'},
												{text: 'Минус в цветном квадрате (list16)', value: 'list16'},
												{text: 'Минус в белом квадрате (list17)', value: 'list17'}
												
												
												
												
												]
										},
												
											{
											type: 'listbox',
											name: 'listboxColor',
											label: 'Цвет буллетов',
											'values': [
												{text: 'Обычный (colornormal)', value: 'colornormal'},
												{text: 'Положительный (colorplus)', value: 'colorplus'},
												{text: 'Отрицательный (colorminus)', value: 'colorminus'},
												{text: 'Нейтральный (colorneutral)', value: 'colorneutral'}
												]
										},
										
											{
											type: 'listbox',
											name: 'listboxSize',
											label: 'Размер буллетов',
											'values': [
												{text: 'Маленький (sizesmall)', value: 'sizesmall'},
												{text: 'Средний (sizemiddle)', value: 'sizemiddle'},
												{text: 'Большой (sizebig)', value: 'sizebig'}
												]
										}
										
										
										
										
										
													

										
									],
									
													 					
									
									onsubmit: function( e ) {
										 ed.selection.setContent('[list class="' + e.data.listboxName + ' ' + e.data.listboxColor + '  ' + e.data.listboxSize + '"]' + ed.selection.getContent() + '[/list]<br>');									}
								});

                
                
                
                    
 
                }
                
                
                
                
                
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('list_mce_button', tinymce.plugins.list);
})();

