
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sidebar" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">REPORTES PCM</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{ route('inicio') }}" class="nav-link @if (Request::is('/')) active @endif text-white" aria-current="page">
          <svg class="bi me-2" width="16" height="16"></svg>
          DASHBOARD
        </a>
      </li>
      <li>
        <a href="{{ route('reportes.reporte_atenciones') }}" class="nav-link @if (Request::is('reportes/reporte_atenciones')) active @endif text-white">
          <svg class="bi me-2" width="16" height="16"></svg>
          REPORTE POR ATENCIÓN
        </a>
      </li>
      <li>
        <a href="{{ route('reportes.reporte_atenciones_estado') }}" class="nav-link @if (Request::is('reportes/reporte_atenciones_estado')) active @endif text-white">
          <svg class="bi me-2" width="16" height="16"></svg>
          REPORTE POR ESTADO
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <P>CENTROS MAC</P>
    </div>
  </div>