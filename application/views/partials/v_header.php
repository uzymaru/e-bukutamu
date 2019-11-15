
<div class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a href="<?php echo base_url();?>" class="navbar-brand">CodeIgniter <small>V3.0.5</small></a>
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse" id="navbar-main">
      <ul class="nav navbar-nav">
        <li class="<?php echo ($this->uri->segment(1) == '' ? 'active' : '');?>">
          <a href="<?php echo base_url();?>">Home</a>
        </li>
      </ul>
    </div>
  </div>
</div>