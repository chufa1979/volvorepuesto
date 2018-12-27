function fontResize() 
{
	var resolucion = $(window).width();
	if (resolucion<750){
		document.getElementById('menu_back').style.display = 'none';
		document.getElementById('buscad1').style.display = 'none';
		document.getElementById('menu_responsive').style.display = 'block';
		document.getElementById('buscad2').style.display = 'block';
		document.getElementById('submenu1').style.display = 'none';	
		document.getElementById('submenu2').style.display = 'none';	
		document.getElementById('submenu3').style.display = 'none';
		
	} else {
		document.getElementById('menu_back').style.display = 'block';
		document.getElementById('buscad1').style.display = 'block';
		document.getElementById('menu_responsive').style.display = 'none';
		document.getElementById('buscad2').style.display = 'none';	
		document.getElementById('submenu1').style.display = 'block';	
		document.getElementById('submenu2').style.display = 'block';	
		document.getElementById('submenu3').style.display = 'block';
	}
};

$(document).ready(function()
     {       
         fontResize();
         $(window).bind('resize', function() {
             fontResize();
         });
     }
)