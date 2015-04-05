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
- Resgatar através do plugin params()->fromQuery() categories no indexAction da ViewController;
- Criado nova action itemAction na ViewController;
- Resgatar através do plugin params()->fromQuery() itemId no itemAction do ViewController;
- Adicionado redirect 'plugin redirect()' para rota 'market' em itemAction, caso itemId for vazio.
- FlashMessenger utilizado quando itemId estiver vazio.

######Item D
- Add controller alias 'alt' para market-view-controller