<!doctype html>
<html class="is-smooth-scroll-compatible is-loading" lang="en">

<?php $this->load->view('front_includes/header-analytics'); ?>

<body class="scroll_down">

  <?php $this->load->view('front_includes/header'); ?>


  <!-- <section class="hero-banner hero_content" >
        <h3>ABOUT US</h3>
    </section> -->



  <section class="profile ptb othePage d-flex align-items-center">
    <div class="rl_space">

      <div class="text-center contact-form">
        <h3>About Us</h3>
      </div>
      <p class="mb-2">As an architectural firm we have the ability to develop ambitious and innovative architectural design solutions.
        With the some of the leading consultants at our side we are able to translate these concepts into reality. With a combined unrivalled pool of knowledge and building experience of over two hundred years, the practice has developed excellent contacts within the industry, and from the outset all consultants and contractors are treated as integral members of our design studio. When a project requires it, we join forces with other architectural practices, working in collaboration to achieve the best possible result for our clients. This inclusive, collaborative approach is integral to our design philosophy.
      </p>
      <p class="mb-2">In the drive to improve building performance, we hamess the most innovative and cutting edge technologies and materials available.</p>

      <p>We are constantly looking to related disciplines and new technologies which help us develop our design solutions to the optimum standard.</p>
    </div>
  </section>

  <?php $this->load->view('front_includes/footer'); ?>
  <?php $this->load->view('front_includes/footer-analytics'); ?>

</body>

<!-- <script>
  function addClassOnScroll() {
    var element = document.getElementById("myElement");
    var scrollPosition = window.scrollY;

    if (scrollPosition > 400) {
      element.classList.add("special");
    } else {
      element.classList.remove("special");
    }
  }

  // Run on page load
  addClassOnScroll();

  // Run on scroll
  window.addEventListener('scroll', function() {
    addClassOnScroll();
  });
</script> -->

</html>