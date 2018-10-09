<?php
namespace Dfe\Unlink\CatalogUrlRewrite\Model\Category;
use Dfe\Unlink\Catalog\Api\Helper\CategoryLinkRepositoryInterface as P;
use Magento\Catalog\Model\Category as C;
use Magento\CatalogUrlRewrite\Model\Category\ChildrenCategoriesProvider as Sb;
// 2018-10-09
final class ChildrenCategoriesProvider {
	/**
	 * 2018-10-09
	 * @see Sb::getChildren()
	 * https://github.com/magento/magento2/blob/2.2.6/app/code/Magento/CatalogUrlRewrite/Model/Category/ChildrenCategoriesProvider.php#L17-L29
	 * @param Sb $sb
	 * @param \Closure $f
	 * @param C $c
	 * @param bool $r [optional]
	 * @return C[]
	 */
	function aroundGetChildren(Sb $sb, \Closure $f, C $c, $r = false) {return $c[P::K] ? [] : $f($c, $r);}	
}