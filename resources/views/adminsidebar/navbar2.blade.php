<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="ti-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="ti-clipboard menu-icon"></i>
              <span class="menu-title">Creación</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/addcategory')}}">Agregar Categoria</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/addproduct')}}">Agregar Producto</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/addslider')}}">Agregar Panel</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="ti-layout menu-icon"></i>
              <span class="menu-title">Vista</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/categories')}}">Categoria</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/products')}}">Productos</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/sliders')}}">Panel</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/orders')}}">Ordenes</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>