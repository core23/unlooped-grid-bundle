<?php

namespace Unlooped\GridBundle\Model;

use Knp\Component\Pager\Pagination\PaginationInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Unlooped\GridBundle\ColumnType\AbstractColumnType;
use Unlooped\GridBundle\Entity\Filter;
use Unlooped\GridBundle\Helper\GridHelper;

class Grid
{

    /** @var GridHelper */
    private $gridHelper;
    /** @var PaginationInterface */
    private $pagination;
    /** @var FormInterface */
    private $filterForm;
    /** @var FormView */
    private $filterFormView;
    /** @var bool */
    private $filterApplied;
    /** @var string */
    private $route;
    /** @var array */
    private $routeParams;
    /** @var int */
    private $currentPage;
    /** @var int */
    private $currentPerPage;
    private $saveFilter;
    private $existingFilters;

    public function __construct(
        GridHelper $gridHelper,
        PaginationInterface $pagination,
        FormInterface $filterForm,
        int $currentPage,
        int $currentPerPage,
        bool $saveFilter = false,
        bool $filterApplied = false,
        string $route = '',
        array  $routeParams = [],
        array $existingFilters = []
    )
    {
        $this->gridHelper = $gridHelper;
        $this->pagination = $pagination;
        $this->filterForm = $filterForm;
        $this->filterFormView = $filterForm->createView();
        $this->filterApplied = $filterApplied;
        $this->currentPage = $currentPage;
        $this->currentPerPage = $currentPerPage;
        $this->route = $route;
        $this->routeParams = $routeParams;
        $this->saveFilter = $saveFilter;
        $this->existingFilters = $existingFilters;
    }

    public function getPagination(): PaginationInterface
    {
        return $this->pagination;
    }

    public function getHelper(): GridHelper
    {
        return $this->gridHelper;
    }

    /**
     * @return array|AbstractColumnType[]
     */
    public function getColumns(): array
    {
        return $this->gridHelper->getColumns();
    }

    public function getFilter(): Filter
    {
        return $this->gridHelper->getFilter();
    }

    public function getFilterForm(): FormInterface
    {
        return $this->filterForm;
    }

    public function getFilterFormView(): FormView
    {
        return $this->filterFormView;
    }

    public function getFilterApplied(): bool
    {
        return $this->filterApplied;
    }

    public function getTitle(): string
    {
        return $this->gridHelper->getTitle();
    }

    public function getListRow(): ?string
    {
        return $this->gridHelper->getListRow();
    }

    public function getCreateRoute(): ?string
    {
        return $this->gridHelper->getCreateRoute();
    }

    public function getCreateLabel(): ?string
    {
        return $this->gridHelper->getCreateLabel();
    }

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    public function getCurrentPerPage(): int
    {
        return $this->currentPerPage;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function getRouteParams(): array
    {
        return $this->routeParams;
    }

    public function isSaveFilter(): bool
    {
        return $this->saveFilter;
    }

    /**
     * @return array|Filter[]
     */
    public function getExistingFilters(): array
    {
        return $this->existingFilters;
    }

    public function setExistingFilters(array $existingFilters): void
    {
        $this->existingFilters = $existingFilters;
    }

}
