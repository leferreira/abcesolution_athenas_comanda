<li class="submenu">
                <a href="#">
                   <svg class="icon" viewBox="0 0 98 91" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M19 19.64V15.25C19 12.2663 20.1853 9.40483 22.295 7.29505C24.4048 5.18527 27.2663 4 30.25 4H67.75C70.7337 4 73.5952 5.18527 75.705 7.29505C77.8147 9.40483 79 12.2663 79 15.25V19.64M19 19.64C20.175 19.225 21.435 19 22.75 19H75.25C76.565 19 77.825 19.225 79 19.64M19 19.64C16.8061 20.4157 14.9066 21.8526 13.5634 23.7528C12.2202 25.653 11.4993 27.923 11.5 30.25V34.64M79 19.64C81.1939 20.4157 83.0933 21.8526 84.4366 23.7528C85.7798 25.653 86.5007 27.923 86.5 30.25V34.64M11.5 34.64C12.675 34.225 13.935 34 15.25 34H82.75C84.0273 33.9985 85.2955 34.215 86.5 34.64M11.5 34.64C7.13 36.185 4 40.35 4 45.25V75.25C4 78.2337 5.18526 81.0952 7.29505 83.205C9.40483 85.3147 12.2663 86.5 15.25 86.5H82.75C85.7337 86.5 88.5952 85.3147 90.705 83.205C92.8147 81.0952 94 78.2337 94 75.25V45.25C94.0007 42.923 93.2798 40.653 91.9366 38.7528C90.5933 36.8526 88.6939 35.4157 86.5 34.64" stroke="white" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
                    <span>Estoque</span>
                </a>
                <ul>
                    <li class="subcat">
                        <a href="">Produto</a>
                        <ul>
                            <li><a href="{{ route('produtoestoque.index') }}">Lista de Produtos</a></li>
                        </ul>
                    </li>
                    <li class="subcat">
                        <a href="">Entradas</a>
                        <ul>
                            <li><a href="{{ route('entrada.index') }}">Entradas avulsa</a></li>
                        </ul>
                    </li>
                    <li class="subcat">
                        <a href="">Saídas</a>
                        <ul>
                            <li><a href="{{ route('saida.index') }}">Saídas Avulsas</a></li>
                        </ul>
                    </li>   
					<li class="subcat">
                        <a href="">Movimentações</a>
                        <ul>
                            <li><a href="lst-historico-movimento.html">Histórico de movimento</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </li>