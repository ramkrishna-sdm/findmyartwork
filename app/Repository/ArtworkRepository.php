<?php
namespace App\Repository;

use App\Repository\RepositoryInterface;
use App\Artwork;

class ArtworkRepository implements RepositoryInterface
{
    private $model;

    public function __construct(Artwork $Artwork)
    {
        $this->model = $Artwork;
    }

    //To create and update data
    public function createUpdateData($condition, $parameters)
    {
        return $resultSet = $this->model->updateOrCreate($condition, $parameters);
    }

    //To create data
    public function createData($data){
        return $resultSet = $this->model->create($data);
    }

    //To fetch data
    public function getData($conditions, $method, $withArr = [],$toArray)
    {
        $query = $this->model->whereNotNull('id');

        if (!empty($conditions['id'])) {
            $query->where('id', $conditions['id']);
        }

        if (!empty($conditions['top'])) {
            $query->where('top', $conditions['top']);
        }

        if (!empty($conditions['trending'])) {
            $query->where('trending', $conditions['trending']);
        }

        if (!empty($conditions['gallery_user_id'])) {
            $query->where('gallery_user_id', $conditions['gallery_user_id']);
        }

        if (!empty($conditions['is_deleted'])) {
            $query->where('is_deleted', $conditions['is_deleted']);
        }

        if (!empty($withArr)) {
            $query->with($withArr);
        }

        $resultSet = $query->orderBy('created_at', 'desc')->$method();

        if (!empty($resultSet) && $toArray) {
            $resultSet = $resultSet->toArray();
        }

        return $resultSet;
    }
}