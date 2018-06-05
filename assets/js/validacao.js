
			$(document).ready(function() {
			  $("#tel_residencial").inputmask({
				mask: ["(99) 9999-9999", "(99) 99999-9999", ],
				keepStatic: true
			  });
			});
			
			$(document).ready(function() {
			  $("#cep").inputmask({
				mask: ["99999-999", ],
				keepStatic: true
			  });
			});			


			$(document).ready(function() {
			  $("#tel_celular").inputmask({
				mask: ["(99) 9999-9999", "(99) 99999-9999", ],
				keepStatic: true
			  });
			});
		
			function verifFrm(frm) {
							
								
				var str05     = frm.tel_residencial.value;
				var str06     = frm.tel_celular.value;
				var str07     = frm.email.value;
				
				if (str05 == "") {
					alert("O campo TELEFONE RESIDENCIAL deve ser preenchido corretamente\nPor favor tente novamente.");
					frm.tel_residencial.focus();
					return false;
				}
				
				if (str06 == "") {
					alert("O campo TELEFONE CELULAR deve ser preenchido corretamente\nPor favor tente novamente.");
					frm.tel_celular.focus();
					return false;
				}
				
				if (str07 == "") {
					alert("O campo E-MAIL deve ser preenchido corretamente\nPor favor tente novamente.");
					frm.email.focus();
					return false;
				}	
				
				if(frm.idgrau_instrucao.selectedIndex == 0) {
					alert("Informe o grau de instrução.");
					return false;	
				}
							
				
				var ckbox_array = document.getElementsByTagName('input');
				var cont	    = 0;
						
				for (var i=0;i < ckbox_array.length;i++)
				{
					if (ckbox_array[i].type=='checkbox' && ckbox_array[i].checked)
					{
						count == true;
					}
				}
						
				if(cont)
				{
					return true;
				}
				else
				{
					alert("Você precisa ter pelo menos uma das ofertas selecionadas para concluir a inscrição");
					return false;
				}		
		
			}
			
