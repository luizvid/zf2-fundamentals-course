#Zend Framework 2: Fundamentals New
=======================

Curso oficial Zend Framework 2: Fundamentals

Ministrado pela [Code.Education]

[Code.Education]: http://sites.code.education/home-code/


###Módulo 2 Ex.1
------------
- Composer instalado.
- Zend Skeleton App instalado.
- Zend Framework 2 instalado.
- Virtual host configurado para **onlinemarket.work**
- Resultados obtidos no browser acessando via **localhost:8080** (php -S 0.0.0.0:8080) dentro de _public/_

###Módulo 3 Ex.1
------------
- Event handler attachado ao dispatch em onBootstrap -> Application -> Module.php
- Método onDispatch criado, recebe MvcEvent e seta variável 'caterories' para ViewModel
- layout.phtml configurado para exibir em colunas variável 'categories'.

###Módulo 4 Ex.1
------------
- servico 'categories' implementado no service_manager de module.config.php -> Application com array lista de categorias.
- servico 'categories' chamado no método onDispatch de Application -> Module.php e passado ao ViewModel().
- layout.phtml configurado utilizando ViewHelper htmlList para listar array de categorias.

###Módulo 5 Ex.1
------------
######Item A
- instalado módulo ZendSkeletonModule-master como base para módulo Market.
- pastas e arquivos renomeados de acordo instruções para Market.
- autoload_classmap.php regenerado através do classmap_generator.php

######Item B
- criado novo módulo chamado Search.

######Item C
- instalado ZendDeveloperTools

###Módulo 6 Ex.1
------------
######Item A
- Criado novo controller ViewController com método indexAction que retorna ViewModel.


######Item B
- Criado novo controller PostController com métodos setCategories que recebe array $categories e indexAction que retorna ViewModel;
- Criado factory PostControllerFactory com método createService injetando serviço categories no Controller Post.

######Item C
- Resgatado através do plugin params()->fromQuery() categories no indexAction da ViewController;
- Criado nova action itemAction na ViewController;
- Resgatado através do plugin params()->fromQuery() itemId no itemAction do ViewController;
- Adicionado redirect 'plugin redirect()' para rota 'market' em itemAction, caso itemId for vazio.
- FlashMessenger utilizado quando itemId estiver vazio.

######Item D
- Add controller alias 'alt' para market-view-controller

###Módulo 7 Ex.1
------------
######Item A
- Adicionada rota '/' (homee) no módulo market, que sobrescreve do Application.

######Item B
- Adicionada rota '/market/view' (market-view) no módulo Market.
- Rota '/market' (market) dessabilitada.

######Item C
- Adicionada rota '/market/post' (market-post) em Market.

######Item D
- Adicionadas rotas filhas para '/market/view' '/main[/:category]' e '/item[/:itemId]'(main/item) em Market.
- Alterada captuda de parametros no View Controller de fromQuery para fromRoute();

######Item E
- Normalizando rotas.

###Módulo 8 Ex.1
------------
######Item A
- Alterada forma de retorno do indexAction no IndexController de Market para retorna um ViewModel.

######Item B
- Criada novo template invalid.phtml under market/post e setado no indexAction do PostController

######Item C
- HTML escapado usando view helper $this->escapeHtml() em view/index.phtml para variavel category;

######Item D
- Criada view helper `leftLinks` que linka a lista de categorias no layout principal.

###Módulo 9 Ex.1
------------
- Criada tabela listings

######Item A
- Criada classe PostForm com campos da tabela listings
- Injeção de categories através de PostFormFactory
- Injeção de postForm ao PostController através da PostControllerFactory
- Adicionado caminho para Post Form no menu top

#####Item B
- Form incluído no template post > index.phtml

#####Item C
- Adicionado PostFormFilter com validadores e filtros para formulário e PostFormFilterFactory para injeção de dependência.

#####Item D
- Controller configurado para tratar request post do formulário.

#####Item E
- Todos os campos do formulario e filtros inseridos.

###Módulo 10 Ex.1
------------

######Item A
- Criado pasta Market\src\Market\Model e classe Market\Market ListingsModel tableGateway referente a tabela listings

######Item B
- Criado adapter em config/autoload db.loca.php
- Criada Factory de ListingsTable
- Trait de listingsTable criada com setListingsTable
- Factories das controladoras Index e View criadas para receberem Trait de ListingsTable

######Item C
- Criado método getListingsByCategory na ListingsTable que recebe parametro category na ViewController
- Apresentada lista por categoria na view/index template e organizado em tabela com link para view/item/<id>

######Item D
- Apresentado informações detalhadas em view/item/<id>.

######Item E
- Criado novo método em ListingsTable com retorno do último registro cadastrado de Listings.
- Criado partials de detalhes do item e linkado ao view/item/<id>
- Apresentado na Home o último item detalhado através da partials.
