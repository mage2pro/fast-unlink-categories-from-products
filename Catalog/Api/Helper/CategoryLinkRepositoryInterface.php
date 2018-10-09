<?php
namespace Dfe\Unlink\Catalog\Api\Helper;
use Magento\Catalog\Api\CategoryLinkRepositoryInterface as Sb;
use Magento\Catalog\Api\CategoryRepositoryInterface as IR;
use Magento\Catalog\Model\Category as C;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;
// 2018-10-09
final class CategoryLinkRepositoryInterface {
    /**
	 * 2018-10-09
     * @param IR $r
     */
    function __construct(IR $r) {$this->_r = $r;}

	/**
	 * 2018-10-09
	 * @see \Magento\Catalog\Model\CategoryLinkRepository::deleteByIds()
	 * https://github.com/magento/magento2/blob/2.2.6/app/code/Magento/Catalog/Model/CategoryLinkRepository.php#L73-L103
	 * @see Sb::deleteByIds()
	 * @param Sb $sb
	 * @param \Closure $f
	 * @param int $id
	 * @param string $sku
	 * @return bool
	 * @throws NoSuchEntityException
     * @throws CouldNotSaveException
     * @throws StateException
	 */
	function aroundDeleteByIds(Sb $sb, \Closure $f, $id, $sku) {
		$c = $this->_r->get($id); /** @var C $c */
		try {
			$c[self::K] = true;
			$r = $f($id, $sku); /** @var bool $r */
		}
		finally {$c->unsetData(self::K);}
		return $r;
	}

	/**
	 * 2018-10-09
	 * @used-by __construct()
	 * @used-by aroundDeleteByIds()
	 * @var IR
	 */
	private $_r;

	/**
	 * 2018-10-09
	 * @used-by aroundDeleteByIds() 
	 * @used-by \Dfe\Unlink\CatalogUrlRewrite\Model\Category\ChildrenCategoriesProvider::aroundGetChildren()
	 */
	const K = 'mage2pro_skip_children_reindex';
}


