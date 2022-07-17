<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
      <a href="" class="simple-text logo-mini">
        <div class="logo-image-small">
          {{-- <img src="../assets/img/logo-small.png"> --}}
        </div>
        <!-- <p>CT</p> -->
      </a>
      <a href="" class="simple-text logo-normal">
        Dashboard
        <!-- <div class="logo-image-big">
          <img src="../assets/img/logo-big.png">
        </div> -->
      </a>
    </div>
    <div class="sidebar-wrapper" style="overflow: hidden">
      <ul class="nav">
        <li class="active ">
          <a href="{{route('zip-codes.index')}}">
            <i class="nc-icon nc-bank"></i>
            <p>Zip Codes</p>
          </a>
        </li>
        <li class="active ">
            <a href="{{route('reason-codes.index')}}">
            <i class="nc-icon nc-bank"></i>
            <p>Reason Codes</p>
            </a>
        </li>
        <li class="active ">
            <a href="{{route('status.index')}}">
            <i class="nc-icon nc-bank"></i>
            <p>Status</p>
            </a>
        </li>
      </ul>
    </div>
  </div>
