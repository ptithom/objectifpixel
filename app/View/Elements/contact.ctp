<!-- Contact Section -->
<div id="contact" class="page">
<div class="container">
    <!-- Title Page -->
    <div class="row">
        <div class="span12">
            <div class="title-page">
                <h2 class="title">Contact</h2>
                <h3 class="title-description">Vous aimeriez bien vous faire <a href="#">un shooting</a> avec moi?<br/> Vous avez <a href="#">un theme / une idée</a> a me soumettre ? Ou tout autre requette?<br/s><br/> N'hésitez pas, je vous répondrai !! </h3>
            </div>
        </div>
    </div>
    <!-- End Title Page -->
    
    <!-- Contact Form -->
    <div class="row">
    	<div class="span9">

    	    <div id="response">
            </div>
        
        	<form id="contact-form" class="contact-form" action="/Contacts/send_mail" >
            	<p class="contact-name">
            		<input id="contact_name" type="text" placeholder="Nom Prénom" value="" name="name" />
                </p>
                <p class="contact-email">
                	<input id="contact_email" type="text" placeholder="Adresse Email" value="" name="email" />
                </p>
                <p class="contact-message">
                	<textarea id="contact_message" placeholder="Votre Message" name="message" rows="15" cols="40"></textarea>
                </p>
                <p class="contact-submit">
                	<a  class="submit" href="#">Envoyer</a>
                </p>
                

            </form>
         
        </div>
        
        <div class="span3">
        	<div class="contact-details">
        		<h3>Details</h3>
                <ul>
                    <li><a href="#">t.sire41+objectifpixel(at)gmail.com</a></li>
                    <li>
                        Thomas sire
                        <br>
                        49100 Angers
                        <br>
                        FRANCE
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Contact Form -->
</div>
</div>
<!-- End Contact Section -->

<script>
$(function() {
$(".submit").click(function(){
        var fd = $("#contact-form").serialize();
        console.log("send mail");
        $.ajax({
          url: "<?= Configure::read('host') ?>"+ $("#contact-form").attr('action'),
          type: "POST",
          data: fd,
          success: function(mes) {
            $("#response").html(mes);
          },
          error: function (mes) {
            $("#response").html(mes);
          }
        });
        return false;
    });
});

</script>