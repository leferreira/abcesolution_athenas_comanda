<li class="submenu">
    <a href="#">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
</svg>

        <span>NFE</span>
    </a>
    <ul>
        <li class="subcat">
            <a href="">Emitente</a>
            <ul>
                <li><a href="{{ route('emitente.index') }}">Lista de Emitente</a></li>
                <li><a href="{{ route('emitente.create') }}">Cadastro de Emitente</a></li>
            </ul>
        </li>

        <li class="subcat">
            <a href="">Natureza da Operação</a>
            <ul>
                <li><a href="{{ route('naturezaoperacao.index') }}">Lista de Natureza Operação</a></li>
                <li><a href="{{ route('naturezaoperacao.create') }}">Cadastro de Natureza de Operação</a></li>
            </ul>
        </li>

        <li class="subcat">
            <a href="">Certificado Digital</a>
            <ul>
                <li><a href="{{ route('certificadodigital.index') }}">Lista de Certificado Digital</a></li>
                <li><a href="{{ route('certificadodigital.create') }}">Cadastro de Certificado Digital</a></li>
            </ul>
        </li>
        <li class="subcat">
            <a href="">Notas Fiscais</a>
            <ul>
                <li><a href="{{ route('notafiscal.index') }}">Lista de Notas Fiscais</a></li>
                <li><a href="{{ route('notafiscal.create') }}">Cadastro de Nota Fiscal</a></li>
            </ul>
        </li>


    </ul>
</li>
