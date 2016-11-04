<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        
        <!-- The stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url().'public/css/style.css'; ?>" />
        
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    
    <body>

        <div id="main">
        	
   
        	
        	<form  action="<?php echo base_url().'Usuarios/Login' ?>" method="post">
			<h3>Ingrese sus credenciales de acceso</h3>
        		<br/><br/><br/>
        		<div class="row email">
	    			<input type="text" id="user" name="user" placeholder="Usuario"  required="Ingrese el usuario" />
        		</div>
        		
        		<div class="row pass">
        			<input type="password" id="pass" name="pass" placeholder="Password"  required="Ingrese la clave" />
        		</div>
        		
        		
        		<!-- The rotating arrow -->
        		<div class="arrowCap"></div>
        		<div class="arrow"></div>
        		
        		<p class="meterText">Evaluacion</p>
        		
        		<input type="submit" id="log" value="Login" />
        		
        	</form>
        </div>
        
        <footer>
	        
            <a class="al3xis"> Derechos reservados Team X Electiva II</a>
        </footer>
        
        <!-- JavaScript includes - jQuery, the complexify plugin and our own script.js -->
		<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>

		     
    </body>
</html>

<script type="text/javascript">
$(function(){
	
	var pass1 = $('#password1'),
		pass2 = $('#password2'),
		email = $('#email'),
		form = $('#main form'),
		arrow = $('#main .arrow');

	// Empty the fields on load
	$('#main .row input').val('');

	// Handle form submissions
	form.on('submit',function(e){
		
		// Is everything entered correctly?
		if($('#main .row.success').length == $('#main .row').length){
			
			// Yes!
			alert("Thank you for trying out this demo!");
			e.preventDefault(); // Remove this to allow actual submission
			
		}
		else{
			
			// No. Prevent form submission
			e.preventDefault();
			
		}
	});
	
	// Validate the email field
	email.on('blur',function(){
		
		// Very simple validation
		if (!/^\S+@\S+\.\S+$/.test(email.val())){
			email.parent().addClass('error').removeClass('success');
		}
		else{
			email.parent().removeClass('error').addClass('success');
		}
		
	});

	// Use the complexify plugin on the first password field
	pass1.complexify({minimumChars:6, strengthScaleFactor:0.7}, function(valid, complexity){
		
		if(valid){
			pass2.removeAttr('disabled');
			
			pass1.parent()
					.removeClass('error')
					.addClass('success');
		}
		else{
			pass2.attr('disabled','true');
			
			pass1.parent()
					.removeClass('success')
					.addClass('error');
		}
		
		var calculated = (complexity/100)*268 - 134;
		var prop = 'rotate('+(calculated)+'deg)';
		
		// Rotate the arrow
		arrow.css({
			'-moz-transform':prop,
			'-webkit-transform':prop,
			'-o-transform':prop,
			'-ms-transform':prop,
			'transform':prop
		});
	});
	
	// Validate the second password field
	pass2.on('keydown input',function(){
		
		// Make sure its value equals the first's
		if(pass2.val() == pass1.val()){
			
			pass2.parent()
					.removeClass('error')
					.addClass('success');
		}
		else{
			pass2.parent()
					.removeClass('success')
					.addClass('error');
		} 
	});
	
});
//jquery complexify.js script
/*
	http://github.com/danpalmer/jquery.complexify.js

	This code is distributed under the WTFPL v2:



})(jQuery);
</script>