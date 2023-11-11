<?php 
$this->load->view('admin/Template/Header');
$this->load->view('admin/Template/Navbar');
$this->load->view('admin/Template/Sidebar');
$this->load->view($content);
$this->load->view('admin/Template/Footer');
 ?> 









 <main>
<div class="container-fluid">
<h1 class="mt-4">Static Navigation</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item"><a hre
f="index.html">Dashboard</a></li>
<li class="breadcrumb-item active">Static Nav
igation</li>
</ol>
<div class="card mb-4">
<div class="card-body">
<p class="mb-0">
This page is an example of using stat
ic navigation. By removing the
<code>.sb-nav-fixed</code>
class from the
<code>body</code>
, the top navigation and side navigat
ion will become static on scroll. Scroll down this page to see an example
.
</p>
</div>
</div>
<div style="height: 100vh"></div>
<div class="card mb-4"><div class="cardbody">When scrolling, the navigation stays at the top of the page. This i
s the end of the static navigation demo.</div></div>
</div>
</main>