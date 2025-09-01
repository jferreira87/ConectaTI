<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Chamados Controller
 *
 * @property \App\Model\Table\ChamadosTable $Chamados
 * @method \App\Model\Entity\Chamado[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChamadosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Cadastros'],
        ];
        $chamados = $this->paginate($this->Chamados);

        $this->set(compact('chamados'));
    }

    /**
     * View method
     *
     * @param string|null $id Chamado id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $chamado = $this->Chamados->get($id, [
            'contain' => ['Cadastros'],
        ]);

        $this->set(compact('chamado'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $chamado = $this->Chamados->newEmptyEntity();
        if ($this->request->is('post')) {
            $chamado = $this->Chamados->patchEntity($chamado, $this->request->getData());
            if ($this->Chamados->save($chamado)) {
                $this->Flash->success(__('The chamado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chamado could not be saved. Please, try again.'));
        }
        $cadastros = $this->Chamados->Cadastros->find('list', ['limit' => 200])->all();
        $this->set(compact('chamado', 'cadastros'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chamado id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $chamado = $this->Chamados->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chamado = $this->Chamados->patchEntity($chamado, $this->request->getData());
            if ($this->Chamados->save($chamado)) {
                $this->Flash->success(__('The chamado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chamado could not be saved. Please, try again.'));
        }
        $cadastros = $this->Chamados->Cadastros->find('list', ['limit' => 200])->all();
        $this->set(compact('chamado', 'cadastros'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chamado id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['post', 'delete']);
        $chamado = $this->Chamados->get($id);
        if ($this->Chamados->delete($chamado)) {
            $this->Flash->success(__('The chamado has been deleted.'));
        } else {
            $this->Flash->error(__('The chamado could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function encerrar($id = null)
{
    $chamado = $this->Chamados->get($id);
    $chamado->status = 'encerrado';
    $chamado->previsao_encerramento = date('Y-m-d H:i:s');

    if ($this->Chamados->save($chamado)) {
        $this->Flash->success(__('Chamado encerrado com sucesso.'));
    } else {
        $this->Flash->error(__('Não foi possível encerrar o chamado.'));
    }

    return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
}

}
