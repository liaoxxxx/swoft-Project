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
 * @Entity(table="goods")
 */
class Goods  extends Model
{
    /**
     *
     * @Id()
     * @Column(name="id")
     * @var int|null
     */
    private $id;


    /**
     * @Column(name="cate_id")
     * @var string|null
     */
    private  $cateId;

    /**
     * @Column(name="name")
     */
    private $name;

    /**
     * @Column(name="summary")
     * @var string
     */
    private string $summary;




    /**
     * @Column(name="title")
     * @var string
     */
    private string $title;



    /**
     * @Column(name="sub_title")
     * @var string
     */
    private string $subTitle;




    /**
     * @Column(name="base_price")
     * @var string
     */
    private string $basePrice;



    /**
     * @Column(name="input_price")
     * @var string
     */
    private string $inputPrice;



    /**
     * @Column(name="show_price")
     * @var string
     */
    private string $showPrice;

    /**@Column(name="images")
     * @var string
     */
    private  string $images;




    /**
     * @Column(name="created_at")
     * @var int
     */
    private  $createdAt;


    /**
     * @Column()
     * @var int|null
     */
    private ?int $status;

    /**
     * @Column(name="is_delete")
     * @var int|null
     */
    private  $isDelete;



    /**
     * @Column(name="updated_at")
     * @var int|null
     */
    private  $updatedAt;



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
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getSubTitle(): string
    {
        return $this->subTitle;
    }

    /**
     * @param string $subTitle
     */
    public function setSubTitle(string $subTitle): void
    {
        $this->subTitle = $subTitle;
    }

    /**
     * @return string
     */
    public function getBasePrice(): string
    {
        return $this->basePrice;
    }

    /**
     * @param string $basePrice
     */
    public function setBasePrice(string $basePrice): void
    {
        $this->basePrice = $basePrice;
    }

    /**
     * @return string
     */
    public function getInputPrice(): string
    {
        return $this->inputPrice;
    }

    /**
     * @param string $inputPrice
     */
    public function setInputPrice(string $inputPrice): void
    {
        $this->inputPrice = $inputPrice;
    }

    /**
     * @return string
     */
    public function getShowPrice(): string
    {
        return $this->showPrice;
    }

    /**
     * @param string $showPrice
     */
    public function setShowPrice(string $showPrice): void
    {
        $this->showPrice = $showPrice;
    }






    /**
     * @return string
     */
    public function getImages(): string
    {
        return $this->images;
    }

    /**
     * @param string $images
     */
    public function setImages(string $images): void
    {
        $this->images = $images;
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
    public function getCateId(): string
    {
        return $this->cateId;
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
