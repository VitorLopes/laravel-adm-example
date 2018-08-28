<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\CreditRequest;
use App\Models\Credit;
use Illuminate\Http\Request;

class CreditController extends AdminBaseController
{
    private $repository;

    public function __construct(Credit $repository)
    {
        $this->repository = $repository;
        $this->setItem('title', 'Crédito')
            ->setItemRouteBase('credit');
    }

    public function index(Request $request)
    {
        $entity = $this->repository->orderBy('name');
        if ($filter = $request->get('filter'))
        {
            $entity = $entity->where(function($where) use($filter){
                $where->where('name', 'LIKE', "%$filter%")
                    ->orWhere('id', $filter);
            });
            $this->setItem('filter', $filter);
        }
        $this->setItem('model', $entity->paginate(10));
        return view($this->getViewNameIndex(), $this->getItems());
    }

    public function create()
    {
        $this->setItemButtonLabelCreate();
        return view($this->getViewNameCreateOrEdit(), $this->getItems());
    }

    public function edit($id)
    {
        $this->setItemButtonLabelEdit();
        $entity = $this->repository->find($id);
        if ($entity)
        {
            $this->setItem('model', $entity);
            return view($this->getViewNameCreateOrEdit(), $this->getItems());
        }
        return redirect($this->getRouteBaseIndex());
    }

    public function save(CreditRequest $request)
    {
        if ($request->get('id'))
        {
            $entity = $this->repository->find($request->get('id'));
            if ($entity)
            {
                $entity->fill($request->only(['name']));
                $entity->save();
            }
        }
        else
        {
            $entity = $this->repository->create($request->only(['name']));
        }
        if ($entity)
        {
            return redirect($this->getRouteBaseEdit($entity->id));
        }
        return redirect($this->getRouteBaseIndex());
    }

    public function delete($id)
    {
        if ($entity = $this->repository->find($id))
        {
            $entity->delete();
        }
        return redirect($this->getRouteBaseIndex());
    }
}
