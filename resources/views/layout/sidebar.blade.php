<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{ active_class_active(['/']) }}">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="ti-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item {{ active_class_active(['widgets']) }}">
      <a class="nav-link" href="{{ url('widgets') }}">
        <i class="ti-settings menu-icon"></i>
        <span class="menu-title">Widgets</span>
      </a>
    </li>
    <li class="nav-item {{ active_class_active(['basic-ui/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#basic-ui" aria-expanded="{{ is_active_route_active(['basic-ui/*']) }}" aria-controls="basic-ui">

        <i class="ti-palette menu-icon"></i>
        <span class="menu-title">UI Elements</span>
        <i class="menu-arrow"></i>
      </a>
       <div class="collapse {{ show_class_show(['basic-ui/*']) }}" id="basic-ui">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class_active(['basic-ui/accordions']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/accordions') }}">Accordions</a>
          </li>
          <li class="nav-item {{ active_class_active(['basic-ui/buttons']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/buttons') }}">Buttons</a>
          </li>
          <li class="nav-item {{ active_class_active(['basic-ui/badges']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/badges') }}">Badges</a>
          </li>
          <li class="nav-item {{ active_class_active(['basic-ui/breadcrumbs']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/breadcrumbs') }}">Breadcrumbs</a>
          </li>
          <li class="nav-item {{ active_class_active(['basic-ui/dropdowns']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/dropdowns') }}">Dropdowns</a>
          </li>
          <li class="nav-item {{ active_class_active(['basic-ui/modals']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/modals') }}">Modals</a>
          </li>
          <li class="nav-item {{ active_class_active(['basic-ui/progress-bar']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/progress-bar') }}">Progress Bar</a>
          </li>
          <li class="nav-item {{ active_class_active(['basic-ui/pagination']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/pagination') }}">Pagination</a>
          </li>
          <li class="nav-item {{ active_class_active(['basic-ui/tabs']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/tabs') }}">Tabs</a>
          </li>
          <li class="nav-item {{ active_class_active(['basic-ui/typography']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/typography') }}">Typography</a>
          </li>
          <li class="nav-item {{ active_class_active(['basic-ui/tooltips']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/tooltips') }}">Tooltips</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item {{ active_class_active(['advanced-ui/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#advanced-ui" aria-expanded="{{ is_active_route_active(['advanced-ui/*']) }}" aria-controls="advanced-ui">

        <i class="ti-view-list menu-icon"></i>
        <span class="menu-title">Advanced UI</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class_show(['advanced-ui/*']) }}" id="advanced-ui">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class_active(['advanced-ui/dragula']) }}">
            <a class="nav-link" href="{{ url('/advanced-ui/dragula') }}">Dragula</a>
          </li>
          <li class="nav-item {{ active_class_active(['advanced-ui/clipboard']) }}">
            <a class="nav-link" href="{{ url('/advanced-ui/clipboard') }}">Clipboard</a>
          </li>
          <li class="nav-item {{ active_class_active(['advanced-ui/context-menu']) }}">
            <a class="nav-link" href="{{ url('/advanced-ui/context-menu') }}">Context Menu</a>
          </li>
          <li class="nav-item {{ active_class_active(['advanced-ui/popups']) }}">
            <a class="nav-link" href="{{ url('/advanced-ui/popups') }}">Popups</a>
          </li>
          <li class="nav-item {{ active_class_active(['advanced-ui/sliders']) }}">
            <a class="nav-link" href="{{ url('/advanced-ui/sliders') }}">Sliders</a>
          </li>
          <li class="nav-item {{ active_class_active(['advanced-ui/carousel']) }}">
            <a class="nav-link" href="{{ url('/advanced-ui/carousel') }}">Carousel</a>
          </li>
          <li class="nav-item {{ active_class_active(['advanced-ui/loaders']) }}">
            <a class="nav-link" href="{{ url('/advanced-ui/loaders') }}">Loaders</a>
          </li>
          <li class="nav-item {{ active_class_active(['advanced-ui/tree-view']) }}">
            <a class="nav-link" href="{{ url('/advanced-ui/tree-view') }}">Tree View</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item  {{ active_class_active(['forms/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#forms" aria-expanded="{{ is_active_route_active(['forms/*']) }}" aria-controls="forms">
        <i class="ti-clipboard menu-icon"></i>
        <span class="menu-title">Form elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class_show(['forms/*']) }}" id="forms">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class_active(['forms/basic-elements']) }}">
            <a class="nav-link" href="{{ url('/forms/basic-elements') }}">Basic Elements</a>
          </li>
          <li class="nav-item {{ active_class_active(['forms/advanced-elements']) }}">
            <a class="nav-link" href="{{ url('/forms/advanced-elements') }}">Advanced Elements</a>
          </li>
          <li class="nav-item {{ active_class_active(['forms/form-validation']) }}">
            <a class="nav-link" href="{{ url('/forms/form-validation') }}">Validation</a>
          </li>
          <li class="nav-item {{ active_class_active(['forms/step-wizard']) }}">
            <a class="nav-link" href="{{ url('/forms/step-wizard') }}">Step Wizard</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item {{ active_class_active(['editors/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="{{ is_active_route_active(['editors/*']) }}" aria-controls="editors">
        <i class="ti-eraser menu-icon"></i>
        <span class="menu-title">Editors</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class_show(['editors/*']) }}" id="editors">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class_active(['editors/text-editor']) }}">
            <a class="nav-link" href="{{ url('/editors/text-editor') }}">Text Editor</a>
          </li>
          <li class="nav-item {{ active_class_active(['editors/code-editor']) }}">
            <a class="nav-link" href="{{ url('/editors/code-editor') }}">Code Editor</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item  {{ active_class_active(['charts/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="{{ is_active_route_active(['charts/*']) }}" aria-controls="charts">

        <i class="ti-bar-chart-alt menu-icon"></i>
        <span class="menu-title">Charts</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class_show(['charts/*']) }}" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class_active(['charts/chartjs']) }}">
            <a class="nav-link" href="{{ url('/charts/chartjs') }}">Chart Js</a>
          </li>
          <li class="nav-item {{ active_class_active(['charts/morris']) }}">
            <a class="nav-link" href="{{ url('/charts/morris') }}">Morris</a>
          </li>
          <li class="nav-item {{ active_class_active(['charts/flot']) }}">
            <a class="nav-link" href="{{ url('/charts/flot') }}">Flot</a>
          </li>
          <li class="nav-item {{ active_class_active(['charts/google-charts']) }}">
            <a class="nav-link" href="{{ url('/charts/google-charts') }}">Google Charts</a>
          </li>
          <li class="nav-item {{ active_class_active(['charts/sparklinejs']) }}">
            <a class="nav-link" href="{{ url('/charts/sparklinejs') }}">Sparkline Js</a>
          </li>
          <li class="nav-item {{ active_class_active(['charts/c3-charts']) }}">
            <a class="nav-link" href="{{ url('/charts/c3-charts') }}">C3 Charts</a>
          </li>
          <li class="nav-item {{ active_class_active(['charts/chartist']) }}">
            <a class="nav-link" href="{{ url('/charts/chartist') }}">Chartist</a>
          </li>
          <li class="nav-item {{ active_class_active(['charts/justgage']) }}">
            <a class="nav-link" href="{{ url('/charts/justgage') }}">JustGage</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item  {{ active_class_active(['tables/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="{{ is_active_route_active(['tables/*']) }}" aria-controls="tables">
        <i class="ti-layout menu-icon"></i>
        <span class="menu-title">Tables</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class_show(['tables/*']) }}" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class_active(['tables/basic-table']) }}">
            <a class="nav-link" href="{{ url('/tables/basic-table') }}">Basic Table</a>
          </li>
          <li class="nav-item {{ active_class_active(['tables/data-table']) }}">
            <a class="nav-link" href="{{ url('/tables/data-table') }}">Data Table</a>
          </li>
          <li class="nav-item {{ active_class_active(['tables/js-grid']) }}">
            <a class="nav-link" href="{{ url('/tables/js-grid') }}">Js-grid</a>
          </li>
          <li class="nav-item {{ active_class_active(['tables/sortable-table']) }}">
            <a class="nav-link" href="{{ url('/tables/sortable-table') }}">Sortable Table</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item {{ active_class_active(['notifications']) }}">
      <a class="nav-link" href="{{ url('notifications') }}">
        <i class="ti-bell menu-icon"></i>
        <span class="menu-title">Notifications</span>
      </a>
    </li>
    <li class="nav-item {{ active_class_active(['icons/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="{{ is_active_route_active(['icons/*']) }}" aria-controls="icons">
        <i class="ti-face-smile menu-icon"></i>
        <span class="menu-title">Icons</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class_show(['icons/*']) }}" id="icons">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class_active(['icons/material']) }}">
            <a class="nav-link" href="{{ url('/icons/material') }}">Material</a>
          </li>
          <li class="nav-item {{ active_class_active(['icons/flag-icons']) }}">
            <a class="nav-link" href="{{ url('/icons/flag-icons') }}">Flag Icons</a>
          </li>
          <li class="nav-item {{ active_class_active(['icons/font-awesome']) }}">
            <a class="nav-link" href="{{ url('/icons/font-awesome') }}">Font Awesome</a>
          </li>
          <li class="nav-item {{ active_class_active(['icons/simple-line-icons']) }}">
            <a class="nav-link" href="{{ url('/icons/simple-line-icons') }}">Simple Line Icons</a>
          </li>
          <li class="nav-item {{ active_class_active(['icons/themify']) }}">
            <a class="nav-link" href="{{ url('/icons/themify') }}">Themify</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item {{ active_class_active(['maps/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#maps" aria-expanded="{{ is_active_route_active(['maps/*']) }}" aria-controls="maps">
        <i class="ti-map menu-icon"></i>
        <span class="menu-title">Maps</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class_show(['maps/*']) }}" id="maps">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class_active(['maps/vector-map']) }}">
            <a class="nav-link" href="{{ url('/maps/vector-map') }}">Vector Map</a>
          </li>
          <li class="nav-item {{ active_class_active(['maps/mapael']) }}">
            <a class="nav-link" href="{{ url('/maps/mapael') }}">Mapael</a>
          </li>
          <li class="nav-item {{ active_class_active(['maps/google-maps']) }}">
            <a class="nav-link" href="{{ url('/maps/google-maps') }}">Google Maps</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item {{ active_class_active(['user-pages/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#user-pages" aria-expanded="{{ is_active_route_active(['user-pages/*']) }}" aria-controls="user-pages">
        <i class="ti-layers-alt menu-icon"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class_show(['user-pages/*']) }}" id="user-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class_active(['user-pages/login']) }}">
            <a class="nav-link" href="{{ url('/user-pages/login') }}">Login</a>
          </li>
          <li class="nav-item {{ active_class_active(['user-pages/login-2']) }}">
            <a class="nav-link" href="{{ url('/user-pages/login-2') }}">Login 2</a>
          </li>
          <li class="nav-item {{ active_class_active(['user-pages/multi-step-login']) }}">
            <a class="nav-link" href="{{ url('/user-pages/multi-step-login') }}">Multi Step Logins</a>
          </li>
          <li class="nav-item {{ active_class_active(['user-pages/register']) }}">
            <a class="nav-link" href="{{ url('/user-pages/register') }}">Register</a>
          </li>
          <li class="nav-item {{ active_class_active(['user-pages/register-2']) }}">
            <a class="nav-link" href="{{ url('/user-pages/register-2') }}">Register 2</a>
          </li>
          <li class="nav-item {{ active_class_active(['user-pages/lock-screen']) }}">
            <a class="nav-link" href="{{ url('/user-pages/lock-screen') }}">Lock Screen</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item {{ active_class_active(['error-pages/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#error-pages" aria-expanded="{{ is_active_route_active(['error-pages/*']) }}" aria-controls="error-pages">
        <i class="ti-help-alt menu-icon"></i>
        <span class="menu-title">Error pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class_show(['error-pages/*']) }}" id="error-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class_active(['error-pages/error-404']) }}">
            <a class="nav-link" href="{{ url('/error-pages/error-404') }}">404</a>
          </li>
          <li class="nav-item {{ active_class_active(['error-pages/error-500']) }}">
            <a class="nav-link" href="{{ url('/error-pages/error-500') }}">500</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item {{ active_class_active(['general-pages/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="{{ is_active_route_active(['general-pages/*']) }}" aria-controls="general-pages">
        <i class="ti-layers menu-icon"></i>
        <span class="menu-title">General Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class_show(['general-pages/*']) }}" id="general-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class_active(['general-pages/blank-page']) }}">
            <a class="nav-link" href="{{ url('/general-pages/blank-page') }}">Blank Page</a>
          </li>
          <li class="nav-item {{ active_class_active(['general-pages/profile']) }}">
            <a class="nav-link" href="{{ url('/general-pages/profile') }}">Profile</a>
          </li>
          <li class="nav-item {{ active_class_active(['general-pages/faq']) }}">
            <a class="nav-link" href="{{ url('/general-pages/faq') }}">FAQ</a>
          </li>
          <li class="nav-item {{ active_class_active(['general-pages/faq-2']) }}">
            <a class="nav-link" href="{{ url('/general-pages/faq-2') }}">FAQ 2</a>
          </li>
          <li class="nav-item {{ active_class_active(['general-pages/news-grid']) }}">
            <a class="nav-link" href="{{ url('/general-pages/news-grid') }}">News Grid</a>
          </li>
          <li class="nav-item {{ active_class_active(['general-pages/timeline']) }}">
            <a class="nav-link" href="{{ url('/general-pages/timeline') }}">Timeline</a>
          </li>
          <li class="nav-item {{ active_class_active(['general-pages/search-results']) }}">
            <a class="nav-link" href="{{ url('/general-pages/search-results') }}">Search Results</a>
          </li>
          <li class="nav-item {{ active_class_active(['general-pages/portfolio']) }}">
            <a class="nav-link" href="{{ url('/general-pages/portfolio') }}">Portfolio</a>
          </li>
          <li class="nav-item {{ active_class_active(['general-pages/user-listing']) }}">
            <a class="nav-link" href="{{ url('/general-pages/user-listing') }}">User Listing</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item {{ active_class_active(['ecommerce/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#ecommerce" aria-expanded="{{ is_active_route_active(['ecommerce/*']) }}" aria-controls="ecommerce">
        <i class="ti-shopping-cart menu-icon"></i>
        <span class="menu-title">E-commerce</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class_show(['ecommerce/*']) }}" id="ecommerce">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class_active(['ecommerce/invoice']) }}">
            <a class="nav-link" href="{{ url('/ecommerce/invoice') }}">Invoice</a>
          </li>
          <li class="nav-item {{ active_class_active(['ecommerce/invoice-2']) }}">
            <a class="nav-link" href="{{ url('/ecommerce/invoice-2') }}">Invoice 2</a>
          </li>
          <li class="nav-item {{ active_class_active(['ecommerce/pricing']) }}">
            <a class="nav-link" href="{{ url('/ecommerce/pricing') }}">Pricing</a>
          </li>
          <li class="nav-item {{ active_class_active(['ecommerce/product-catalogue']) }}">
            <a class="nav-link" href="{{ url('/ecommerce/product-catalogue') }}">Product Catalogue</a>
          </li>
          <li class="nav-item {{ active_class_active(['ecommerce/project-list']) }}">
            <a class="nav-link" href="{{ url('/ecommerce/project-list') }}">Project List</a>
          </li>
          <li class="nav-item {{ active_class_active(['ecommerce/orders']) }}">
            <a class="nav-link" href="{{ url('/ecommerce/orders') }}">Orders</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item {{ active_class_active(['apps/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#apps" aria-expanded="{{ is_active_route_active(['apps/*']) }}" aria-controls="apps">
        <i class="mdi mdi-cart-arrow-down menu-icon"></i>
        <span class="menu-title">Apps</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class_show(['apps/*']) }}" id="apps">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class_active(['apps/kanban-board']) }}">
            <a class="nav-link" href="{{ url('/apps/kanban-board') }}">Kanban Board</a>
          </li>
          <li class="nav-item {{ active_class_active(['apps/todo-list']) }}">
            <a class="nav-link" href="{{ url('/apps/todo-list') }}">Todo List</a>
          </li>
          <li class="nav-item {{ active_class_active(['apps/tickets']) }}">
            <a class="nav-link" href="{{ url('/apps/tickets') }}">Tickets</a>
          </li>
          <li class="nav-item {{ active_class_active(['apps/chats']) }}">
            <a class="nav-link" href="{{ url('/apps/chats') }}">Chats</a>
          </li>
          <li class="nav-item {{ active_class_active(['apps/calendar']) }}">
            <a class="nav-link" href="{{ url('/apps/calendar') }}">Calendar</a>
          </li>
          <li class="nav-item {{ active_class_active(['apps/email']) }}">
            <a class="nav-link" href="{{ url('/apps/email') }}">Email</a>
          </li>
          <li class="nav-item {{ active_class_active(['apps/gallery']) }}">
            <a class="nav-link" href="{{ url('/apps/gallery') }}">Gallery</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://www.bootstrapdash.com/demo/justdo-laravel-pro/documentation/documentation.html">
        <i class="ti-write menu-icon"></i>
        <span class="menu-title">Documentation</span>
      </a>
    </li>
  </ul>
</nav>
