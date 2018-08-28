<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminBaseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $data = [];

    public function setItem($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function getItem($key)
    {
        return $this->data[$key];
    }

    public function getItems()
    {
        return $this->data;
    }

    public function setItemRouteBase($value)
    {
        return $this->setItem('routebase', $value)
            ->setItem('routebaseindex', $value.'.index')
            ->setItem('routebaseedit',  $value.'.edit')
            ->setItem('routebasesave',  $value.'.save')
            ->setItem('routebasecreate', $value.'.create')
            ->setItem('routebaseremove', $value.'.delete')
            ->setItem('nameviewindex', 'admin.'.$value.'.index')
            ->setItem('nameviewcreateoredit','admin.'.$value.'.create-edit');

    }

    public function getRouteBaseIndex()
    {
        return route($this->getItem('routebaseindex'));
    }

    public function getRouteBaseEdit($id)
    {
        return route($this->getItem('routebaseedit'), [$id]);
    }

    public function getViewNameIndex()
    {
        return $this->getItem('nameviewindex');
    }

    public function getViewNameCreateOrEdit()
    {
        return $this->getItem('nameviewcreateoredit');
    }

    public function setItemButtonLabelCreate()
    {
        $this->data['buttonsubmitlabel'] = 'Inserir';
        return $this;
    }

    public function setItemButtonLabelEdit()
    {
        $this->data['buttonsubmitlabel'] = 'Alterar';
        return $this;
    }

    public function setItemButtonLabelDelete()
    {
        $this->data['buttondeletelabel'] = 'Excluir';
        return $this;
    }
}
