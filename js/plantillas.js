function hacerEncabezado(){
var encabezadoHTML= `
	<div class="header">
			<table>
				<tr>
					<th class="logo"><a href="index.php"><img src="images/uaem.png" alt="UAEM" title="UAEM" class="max"/></a></th>
					<th class="txt">Secretaría Académica<br />
					   Dirección de Desarrollo de Bibliotecas<br />
					</th>
					<th class="logo"><img src="images/bcu.png" alt="BCU" title="BCU" class="max"/></th>
				</tr>
			</table>
		</div>`;
		
	document.write( encabezadoHTML );
}

function hacerPiePagina(){
	var PiePaginaHTML= `
	<div class="info">
		<a href="https://www.uaem.mx/aviso-de-privacidad/#:~:text=%E2%80%9CLa%20Universidad%E2%80%9D%20no%20transmitir%C3%A1%20sus,General%20de%20Protecci%C3%B3n%20de%20Datos" target="_blank"><p>Consulta el Aviso de Privacidad vigente de la UAEM</p></a>
		</div>
		</div>
		<div class="linea_azul_completa">
		</div>
		<div class="advertencias2">
			<div>
				<img src="images/warning2.png" class="icon_duda" />
				<p class="parrafo_adv">La Biblioteca no se hace responsable por objetos olvidados en las diferentes áreas de uso común</p>
			</div>
			<div>
				<img src="images/Comida.png" class="icon_duda" />
				<p class="parrafo_adv">Está prohibido introducir o consumir bebidas o alimentos dentro de la Biblioteca. Si lo hacen, les será requerido guardar sus alimentos o
				retirarse de las instalaciones</p>
			</div>
		</div>
		<div class="linea_azul_completa">
		</div>
		<div class="footerext">
			<table>
				<tr>
					<th class="logof">
					
					</th>	
					<th class="txtf">
						Universidad Autónoma del Estado de Morelos Av. Universidad 1001. Col. Chamilpa. Cuernavaca, Morelos. C. P. 62209. 
					</th>
					
					<th class="logof">
					   <!--<a href="login.php"> <img id="login" src="images/key.png" /> </a>-->
					</th>
				</tr>
			</table>   
		</div>`;
		
	document.write( PiePaginaHTML );
}