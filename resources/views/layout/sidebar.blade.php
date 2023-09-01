<div class="sidebar-wrapper">
  <ul class="nav">
    <li class="active ">
      <a href="./dashboard.html">
        <i class="nc-icon nc-bank"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li class="{{ (request()->is('product*')) ? 'menu-item active': 'menu-item'}}">
      <a href="{{ url('product') }}" class="menu-link">
        <i class="fa-houzz"></i>
        <p>Produk</p>
      </a>
    </li>
    <li>
      <a href="{{ url('transaksi') }}" class="menu-link">
        <i class="nc-icon nc-pin-3"></i>
        <p>Transaksi</p>
      </a>
    </li>
    <li>
      <a href="{{ url('member') }}" class="menu-link">
        <i class="nc-icon nc-bell-55"></i>
        <p>Member</p>
      </a>
    </li>
    <li>
      <a href="{{ url('employee') }}" class="menu-link">
        <i class="nc-icon nc-bell-55"></i>
        <p>Karyawan</p>
      </a>
    </li>
    <li>
      <a href="{{ url('supplier') }}" class="menu-link">
        <i class="nc-icon nc-bell-55"></i>
        <p>Supplier</p>
      </a>
    </li>
  </ul>
</div>