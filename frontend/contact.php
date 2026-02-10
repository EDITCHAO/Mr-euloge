<!-- ===== Contact Section Start ===== -->
<section class="contact section" id="contact">
  <div class="container">
    <div class="row">
      <div class="section-title padd-15">
        <h2>Contact Me</h2>
      </div>
    </div>
    <h3 class="contact-title padd-15">Have You Any Questions?</h3>
    <h4 class="contact-sub-title padd-15">I'M AT YOUR SERVICES</h4>
    <div class="row">
      <!-- Contact info item -->
      <div class="contact-info-item padd-15">
        <div class="icon"><i class="fa fa-phone"></i></div>
        <h4>Call Us On</h4>
        <p>+228 99 25 38 43</p>
      </div>
      
      <div class="contact-info-item padd-15">
        <div class="icon"><i class="fa fa-map-marker-alt"></i></div>
        <h4>Office</h4>
        <p>LOME, TOGO</p>
      </div>
      
      <div class="contact-info-item padd-15">
        <div class="icon"><i class="fa fa-envelope"></i></div>
        <h4>Email</h4>
        <p>editchaosam@gmail.com</p>
      </div>
      
      <div class="contact-info-item padd-15">
        <div class="icon"><i class="fa fa-globe-europe"></i></div>
        <h4>Website</h4>
        <p>www.Mr-euloge.com</p>
      </div>
    </div>
    
    <h3 class="contact-title padd-15">SEND ME AN EMAIL</h3>
    <h4 class="contact-sub-title padd-15">I'M VERY RESPONSIVE TO MESSAGES</h4>
    
    <!-- Contact Form -->
    <div class="row">
      <div class="contact-form padd-15">
        <form id="contactForm">
          <div class="row">
            <div class="form-item col-6 padd-15">
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
              </div>
            </div>
            <div class="form-item col-6 padd-15">
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-item col-12 padd-15">
              <div class="form-group">
                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-item col-12 padd-15">
              <div class="form-group">
                <textarea name="message" class="form-control" placeholder="Message" required></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-item col-12 padd-15">
              <button type="submit" class="btn">Send Message</button>
            </div>
          </div>
          <div class="row">
            <div class="form-item col-12 padd-15">
              <div id="formMessage" class="form-message"></div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- ===== Contact Section End ===== -->

<script>
// Gestion du formulaire de contact
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const messageDiv = document.getElementById('formMessage');
    
    // Afficher un message de chargement
    messageDiv.innerHTML = '<p style="color: var(--skin-color);">Envoi en cours...</p>';
    
    fetch('backend/contact_handler.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            messageDiv.innerHTML = '<p style="color: green;">' + data.message + '</p>';
            document.getElementById('contactForm').reset();
        } else {
            messageDiv.innerHTML = '<p style="color: red;">Erreurs: ' + data.errors.join(', ') + '</p>';
        }
    })
    .catch(error => {
        messageDiv.innerHTML = '<p style="color: red;">Erreur lors de l\'envoi du message. Veuillez réessayer.</p>';
        console.error('Error:', error);
    });
});
</script>
