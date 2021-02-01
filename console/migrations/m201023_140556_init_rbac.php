<?php

use yii\db\Migration;

/**
 * Class m201023_140556_init_rbac
 */
class m201023_140556_init_rbac extends Migration
{
   
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

        $auth = Yii::$app->authManager;

        // adciona a permissão "createCargo"
        $createCargo = $auth->createPermission('createCargo');
        $createCargo->description = 'Criar um Cargo';
        $auth->add($createCargo);

        // adciona a permissão  "updateCargo"
        $updateCargo = $auth->createPermission('updateCargo');
        $updateCargo->description = 'Update Cargo';
        $auth->add($updateCargo);

        // adciona a permissão  "deleteCargo"
        $deleteCargo = $auth->createPermission('deleteCargo');
        $deleteCargo->description = 'Delete Cargo';
        $auth->add($deleteCargo);

        // adciona a permissão  "createDesconto"
        $createDesconto = $auth->createPermission('createDesconto');
        $createDesconto->description = 'Create Desconto';
        $auth->add($createDesconto);

        // adciona a permissão  "updateDesconto"
        $updateDesconto = $auth->createPermission('updateDesconto');
        $updateDesconto->description = 'Update Desconto';
        $auth->add($updateDesconto);

        // adciona a permissão  "deleteDesconto"
        $deleteDesconto = $auth->createPermission('deleteDesconto');
        $deleteDesconto->description = 'Delete Desconto';
        $auth->add($deleteDesconto);

        // adciona a permissão  "createEmenta"
        $createEmenta = $auth->createPermission('createEmenta');
        $createEmenta->description = 'Create Ementa';
        $auth->add($createEmenta);

        // adciona a permissão  "updateEmenta"
        $updateEmenta = $auth->createPermission('updateEmenta');
        $updateEmenta->description = 'Update Ementa';
        $auth->add($updateEmenta);

        // adciona a permissão  "deleteEmenta"
        $deleteEmenta = $auth->createPermission('deleteEmenta');
        $deleteEmenta->description = 'Delete Ementa';
        $auth->add($deleteEmenta);

        $createPlanonutricao = $auth->createPermission('createPlanonutricao');
        $createPlanonutricao->description = 'Create Plano Nutricao';
        $auth->add($createPlanonutricao);

        $updatePlanonutricao = $auth->createPermission('updatePlanonutricao');
        $updatePlanonutricao->description = 'Update Plano Nutricao';
        $auth->add($updatePlanonutricao);

        $deletePlanonutricao = $auth->createPermission('deletePlanonutricao');
        $deletePlanonutricao->description = 'Delete Plano Nutricao';
        $auth->add($deletePlanonutricao);

        $createPlanotreino = $auth->createPermission('createPlanotreino');
        $createPlanotreino->description = 'Create Plano Treino';
        $auth->add($createPlanotreino);

        $updatePlanotreino = $auth->createPermission('updatePlanotreino');
        $updatePlanotreino->description = 'Update Plano Treino';
        $auth->add($updatePlanotreino);

        $deletePlanotreino = $auth->createPermission('deletePlanotreino');
        $deletePlanotreino->description = 'Delete Plano Treino';
        $auth->add($deletePlanotreino);

        $createSubscricao = $auth->createPermission('createSubscricao');
        $createSubscricao->description = 'Create Subcricao';
        $auth->add($createSubscricao);

        $updateSubscricao = $auth->createPermission('updateSubscricao');
        $updateSubscricao->description = 'Update Subcricao';
        $auth->add($updateSubscricao);

        $deleteSubscricao = $auth->createPermission('deleteSubscricao');
        $deleteSubscricao->description = 'Delete Subscricao';
        $auth->add($deleteSubscricao);

        $createTiposubscricao = $auth->createPermission('createTiposubscricao');
        $createTiposubscricao->description = 'Create Tipo Subcricao';
        $auth->add($createTiposubscricao);

        $updateTiposubscricao = $auth->createPermission('updateTiposubscricao');
        $updateTiposubscricao->description = 'Update Tipo Subcricao';
        $auth->add($updateTiposubscricao);

        $deleteTiposubscricao = $auth->createPermission('deleteTiposubscricao');
        $deleteTiposubscricao->description = 'Delete Tipo Subscricao';
        $auth->add($deleteTiposubscricao);

        $openBackend = $auth->createPermission('openBackend');
        $openBackend->description = 'Open Backend';
        $auth->add($openBackend);

        $signUpFuncionario = $auth->createPermission('signUpFuncionario');
        $signUpFuncionario->description = 'Sign Up Funcionario';
        $auth->add($signUpFuncionario);

        $verPerfil = $auth->createPermission('verPerfil');
        $verPerfil->description = 'Ver o Perfil do Cliente';
        $auth->add($verPerfil);

        $criarEvento = $auth->createPermission('criarEvento');
        $criarEvento->description = 'Criar Evento no Horario';
        $auth->add($criarEvento);

        $verImovel = $auth->createPermission('verImovel');
        $verImovel->description = 'Ver Imovel';
        $auth->add($verImovel);


        // roles dos tipos de utilizador
        $admin = $auth->createRole('admin');
        $funcionario = $auth->createRole('funcionario');
        $cliente = $auth->createRole('cliente');
        $guest = $auth->createRole('guest');
        $auth->add($admin);
        $auth->add($funcionario);
        $auth->add($guest);
        $auth->add($cliente);
        $auth->addChild($admin, $funcionario);
        $auth->addChild($admin, $openBackend);
        $auth->addChild($admin, $signUpFuncionario);
        $auth->addChild($funcionario, $createCargo);
        $auth->addChild($funcionario, $updateCargo);
        $auth->addChild($funcionario, $deleteCargo);
        $auth->addChild($funcionario, $createDesconto);
        $auth->addChild($funcionario, $updateDesconto);
        $auth->addChild($funcionario, $deleteDesconto);
        $auth->addChild($funcionario, $createEmenta);
        $auth->addChild($funcionario, $updateEmenta);
        $auth->addChild($funcionario, $deleteEmenta);
        $auth->addChild($funcionario, $createPlanonutricao);
        $auth->addChild($funcionario, $updatePlanonutricao);
        $auth->addChild($funcionario, $deletePlanonutricao);
        $auth->addChild($funcionario, $createPlanotreino);
        $auth->addChild($funcionario, $updatePlanotreino);
        $auth->addChild($funcionario, $deletePlanotreino);
        $auth->addChild($funcionario, $createSubscricao);
        $auth->addChild($funcionario, $updateSubscricao);
        $auth->addChild($funcionario, $deleteSubscricao);
        $auth->addChild($funcionario, $createTiposubscricao);
        $auth->addChild($funcionario, $updateTiposubscricao);
        $auth->addChild($funcionario, $deleteTiposubscricao);
        $auth->addChild($cliente, $verPerfil);
        $auth->addChild($funcionario, $verPerfil);
        $auth->addChild($funcionario, $criarEvento);
        $auth->addChild($funcionario, $verImovel);


        // Atribui roles para usuários. 1 and 2 são IDs retornados por IdentityInterface::getId()
        // normalmente implementado no seu model User.
        $auth->assign($admin, 1);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}
