<?php

    $app->get('/receita/painel', function ($request, $response, $args) {        
        $sth = $this->db->prepare("select sum(round(sale_price * quantity, 2)) as valor from products");
        $sth->execute();
        $todos = $sth->fetchObject();

        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET')
            ->withJson($todos);
    });



    $app->get('/pedido/painel', function ($request, $response, $args) {        
        $sth = $this->db->prepare("select count(*) as valor from transactions");
        $sth->execute();
        $todos = $sth->fetchObject();

        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET')
            ->withJson($todos);
    });



    $app->get('/produto/painel', function ($request, $response, $args) {        
        $sth = $this->db->prepare("select count(*) as valor from products");
        $sth->execute();
        $todos = $sth->fetchObject();

        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET')
            ->withJson($todos);
    });



    $app->get('/meta', function ($request, $response, $args) {        
        $sth = $this->db->prepare("select concat( round( (sum( round(sale_price * quantity, 2) ) / 1500000) * 100, 2), '%')  as valor from products");
        $sth->execute();
        $todos = $sth->fetchObject();

        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET')
            ->withJson($todos);
    });
 


    $app->get('/midia/painel', function ($request, $response, $args) {        
        $sth = $this->db->prepare("select t.search_medium as nome, sum(round(sale_price * quantity, 2)) as receita from products p inner join transactions t on p.id_transaction = t.id group by t.search_medium order by 2 desc");
        $sth->execute();
        $todos = $sth->fetchAll();

        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET')
            ->withJson($todos);
    });
 
 
    $app->get('/device/painel', function ($request, $response, $args) {        
        $sth = $this->db->prepare("select t.device as nome, sum(round(sale_price * quantity, 2)) as receita from products p inner join transactions t on p.id_transaction = t.id group by t.device order by 2 desc");
        $sth->execute();
        $todos = $sth->fetchAll();

        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET')
            ->withJson($todos);
    });

    $app->get('/categoria/painel', function ($request, $response, $args) {        
        $sth = $this->db->prepare("select p.category as nome, sum(round(sale_price * quantity, 2)) as receita from products p inner join transactions t on p.id_transaction = t.id group by p.category order by 2 desc");
        $sth->execute();
        $todos = $sth->fetchAll();

        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET')
            ->withJson($todos);
    });