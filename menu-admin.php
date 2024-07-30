<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    &nbsp;
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-teal w3-card w3-animate-left" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>

  <a href="a-main.php" onclick="w3_close()" class="w3-bar-item w3-button">UNCLAIM</a>
  <a href="a-list.php" onclick="w3_close()" class="w3-bar-item w3-button">CLAIMED</a>
  <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">LOGOUT</a>

</nav>