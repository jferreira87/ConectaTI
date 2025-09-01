<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cadastros Controller
 *
 * @property \App\Model\Table\CadastrosTable $Cadastros
 * @method \App\Model\Entity\Cadastro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CadastrosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $cadastros = $this->paginate($this->Cadastros);

        $this->set(compact('cadastros'));
    }

    /**
     * View method
     *
     * @param string|null $id Cadastro id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $cadastro = $this->Cadastros->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('cadastro'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $cadastro = $this->Cadastros->newEmptyEntity();
        if ($this->request->is('post')) {
            $cadastro = $this->Cadastros->patchEntity($cadastro, $this->request->getData());
            if ($this->Cadastros->save($cadastro)) {
                $this->Flash->success(__('The cadastro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cadastro could not be saved. Please, try again.'));
        }
        $this->set(compact('cadastro'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cadastro id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $cadastro = $this->Cadastros->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cadastro = $this->Cadastros->patchEntity($cadastro, $this->request->getData());
            if ($this->Cadastros->save($cadastro)) {
                $this->Flash->success(__('The cadastro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cadastro could not be saved. Please, try again.'));
        }
        $this->set(compact('cadastro'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cadastro id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $cadastro = $this->Cadastros->get($id);
        if ($this->Cadastros->delete($cadastro)) {
            $this->Flash->success(__('The cadastro has been deleted.'));
        } else {
            $this->Flash->error(__('The cadastro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
