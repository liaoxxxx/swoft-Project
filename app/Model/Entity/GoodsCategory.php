<?php declare(strict_types=1);


namespace App\Model\Entity;

use phpDocumentor\Reflection\Types\Integer;
use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 *
 * Class User
 *
 * @since 2.0
 *
 * @Entity(table="goods_category")
 */
class GoodsCategory extends Model
{
    /**
     *
     * @Id()
     * @Column(name="id")
     * @var int|null
     */
    private $id;

    /**
     *
     *
     * @Column(name="cate_name")
     * @var string
     */
    private $cateName;

    /**
     *
     *
     * @Column(name="created_at")
     * @var int
     */
    private $createdAt;


    /**
     *
     *
     * @Column(name="parent_id")
     * @var int
     */
    private $parentId ;

    /**
     *
     *
     * @Column()
     * @var string
     */
    private $summary;

    /**
     *
     *
     * @Column()
     * @var int|null
     */
    private $status;

    /**
     *
     *
     * @Column(name="is_delete")
     * @var int|null
     */
    private $isDelete;



    /**
     *
     *
     * @Column(name="updated_at")
     * @var int|null
     */
    private $updatedAt;





    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }



    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     */
    public function setCreatedAt(int $createdAt): void
    {
        $this->createdAt = $createdAt;
    }


    /**
     * @return int|null
     */
    public function getIsDelete(): ?int
    {
        return $this->isDelete;
    }

    /**
     * @param int|null $isDelete
     */
    public function setIsDelete(?int $isDelete): void
    {
        $this->isDelete = $isDelete;
    }



    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int|null $status
     */
    public function setStatus(?int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int|null
     */
    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    /**
     * @param int|null $updatedAt
     */
    public function setUpdatedAt(?int $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }


    /**
     * @return string
     */
    public function getCateName(): string
    {
        return $this->cateName;
    }

    /**
     * @param string $cateName
     */
    public function setCateName(string $cateName): void
    {
        $this->cateName = $cateName;
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parentId;
    }

    /**
     * @param int $parentId
     */
    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

}
