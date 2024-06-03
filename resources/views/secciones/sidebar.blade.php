
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-head sidebar" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">      
      {{-- <span class="fs-4">REPORTES PCM</span> --}}
      <img src="{{ asset('imagen/mac_logo_export.jpg') }}" alt="" width="200">
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{ route('inicio') }}" class="nav-link @if (Request::is('/')) active @endif text-white" aria-current="page">
          {{-- <svg class="bi me-2" width="16" height="16"></svg> --}}
          <svg xmlns="http://www.w3.org/2000/svg" class="bi me-2" height="17" width="16" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
          DASHBOARD
        </a>
      </li>
      <li class="nav-item ">
        <a href="{{ route('reportes.reporte_atenciones') }}" class="nav-link @if (Request::is('reportes/reporte_atenciones')) active @endif text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="bi me-2" height="17" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M64 480H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H288c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64z"/></svg>
          REPORTE POR ATENCIÓN
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('reportes.reporte_atenciones_estado') }}" class="nav-link @if (Request::is('reportes/reporte_atenciones_estado')) active @endif text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="bi me-2" height="17" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M64 480H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H288c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64z"/></svg>
          REPORTE POR ESTADO
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <P>CENTROS MAC</P>
    </div>
  </div>