<?php
declare(strict_types=1);

namespace App\Controller;

use phpDocumentor\Reflection\Types\This;

/**
 * Dashboard Controller
 *
 * @method \App\Model\Entity\Dashboard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // Récupération dans la BDD
        $AllPokemons = $this->loadModel('pokemons');

        // Intervalle Pokemons 4eme génération
        $generation4 = $AllPokemons->find('all')
            ->where(['id >=' => 387])
            ->where(['id <=' => 493]);


        // Récupération type pokemon
        $PokemonFee = $this->loadModel('pokemon_types');

        //On parcourt les tables pour trouver les pokemon fee
        $generation1 = $PokemonFee->find('all')
            ->where(['pokemon_id >=' => 1])
            ->where(['AND' => ['pokemon_id <=' => 151]])
            ->where(['AND' => ['type_id =' => 10]]);
        //3eme génération 
        $generation3 = $PokemonFee->find('all')
            ->where(['pokemon_id >=' => 252])
            ->where(['AND' => ['pokemon_id <=' => 386]])
            ->where(['AND' => ['type_id =' => 10]]);
        //7eme génération
        $generation7 = $PokemonFee->find('all')
            ->where(['pokemon_id >=' => 722])
            ->where(['AND' => ['pokemon_id <=' => 809]])
            ->where(['AND' => ['type_id =' => 10]]);

        // On compte les pokemon de type fee 
        $comptFee=0;
        foreach ($generation1 as $row){
            $comptFee = $comptFee + 1;
        }
        foreach ($generation3 as $row){
            $comptFee = $comptFee + 1;
        }
        foreach ($generation7 as $row){
            $comptFee = $comptFee + 1;
        }   

        
        // Initialisation variables
        $longueur = 0;
        $nbPokemon4 = 0;
        $moyPoids = 0;
        $toutPoids = array();
        
        // Poids moyen 
        foreach ($generation4 as $row){
            $nbPokemon4 = $nbPokemon4 +1; //incrémentation nombre pokemon 
            $toutPoids[] = $row->weight;
        }
        foreach ($toutPoids as $value){
            $moyPoids = $moyPoids + $value; // value = poids pokemon actuel 
        }
        $moyPoids = round($moyPoids/$nbPokemon4, 2);


        //permet d'envoyer les données au Dashboard
        $this->set(compact('row',
            'toutPoids',
            'nbPokemon4',
            'moyPoids',
            'generation4',
            'comptFee'
        ));
    }

    /**
     * View method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dashboard = $this->Dashboard->newEmptyEntity();
        if ($this->request->is('post')) {
            $dashboard = $this->Dashboard->patchEntity($dashboard, $this->request->getData());
            if ($this->Dashboard->save($dashboard)) {
                $this->Flash->success(__('The dashboard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dashboard could not be saved. Please, try again.'));
        }
        $this->set(compact('dashboard'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dashboard = $this->Dashboard->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dashboard = $this->Dashboard->patchEntity($dashboard, $this->request->getData());
            if ($this->Dashboard->save($dashboard)) {
                $this->Flash->success(__('The dashboard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dashboard could not be saved. Please, try again.'));
        }
        $this->set(compact('dashboard'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dashboard = $this->Dashboard->get($id);
        if ($this->Dashboard->delete($dashboard)) {
            $this->Flash->success(__('The dashboard has been deleted.'));
        } else {
            $this->Flash->error(__('The dashboard could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
