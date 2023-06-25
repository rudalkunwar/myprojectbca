<!DOCTYPE html>
<html>
  <head>
    <title>Title of the document</title>
   <link rel="stylesheet" href="../css/popup.css">
  </head>
  <body>
    <h2>Multiple Popup Forms</h2>
    <p>
      <button class="button" onclick="openModal('modalOne')">Contact Us</button>
    </p>
    <p>
      <button class="button" onclick="openModal('modalTwo')">Send a Complaint Form</button>
    </p>

    <div id="modalTwo" class="modal">
      <div class="modal-content">
        <div class="contact-form">
          <span class="close" onclick="closeModal('modalTwo')">&times;</span>
          <form action="/">
            <h2>Complaint form</h2>
            <div>
              <input id="fullnameTwo" type="text" name="fullname" placeholder="Full name" />
              <input id="emailTwo" type="text" name="email" placeholder="Email" />
              <input id="phoneTwo" type="text" name="phone" placeholder="Phone number" />
              <input id="websiteTwo" type="text" name="website" placeholder="Website" />
            </div>
            <span>Message</span>
            <div>
              <textarea id="messageTwo" rows="4"></textarea>
            </div>
            <button type="submit" href="/">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <script>
      function openModal(modalId) {
        document.getElementById(modalId).style.display = "block";
      }
      
      function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
      }
    </script>
  </body>
</html>
