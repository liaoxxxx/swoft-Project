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
 * @Entity(table="upload_file")
 */
class UploadFile extends Model
{
    /**
     *
     * @Id()
     * @Column(name="id")
     * @var int|null
     */
    private  $id;


    /**
     * @var string
     * @Column(name="path")
     */
    private string $path;

    /**
     *
     *
     * @Column(name="created_at")
     * @var int
     */
    private int $createdAt;

    /**
     *
     *
     * @Column(name="updated_at")
     * @var int|null
     */
    private int $updatedAt;

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
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
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





}
