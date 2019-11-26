<?php declare(strict_types=1);


namespace App\Model\Entity;

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
 * @Entity(table="admin")
 */
class Admin extends Model
{
    /**
     *
     * @Id()
     * @Column()
     * @var int|null
     */
    private $id;

    /**
     *
     *
     * @Column()
     * @var string
     */
    private $avatars;

    /**
     *
     *
     * @Column()
     * @var int
     */
    private $createdAt;

    /**
     *
     *
     * @Column(hidden=true)
     * @var string
     */
    private $password;

    /**
     *
     *
     * @Column()
     * @var string
     */
    private $email;

    /**
     *
     *
     * @Column()
     * @var int|null
     */
    private $isAdministrator;

    /**
     *
     *
     * @Column()
     * @var int|null
     */
    private $isDelete;

    /**
     *
     *
     * @Column()
     * @var string
     */
    private $nickname;


    /**
     *
     *
     * @Column()
     * @var string
     */
    private $phone;

    /**
     *
     *
     * @Column()
     * @var string
     */
    private $remark;


    /**
     *
     *
     * @Column()
     * @var string
     */
    private $salt;




    /**
     *
     *
     * @Column()
     * @var int|null
     */
    private $sex;





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
     * @Column()
     * @var int|null
     */
    private $updatedAt;



    /**
     *
     *
     * @Column()
     * @var string|null
     */
    private $username;

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
    public function getAvatars(): string
    {
        return $this->avatars;
    }

    /**
     * @param string $avatars
     */
    public function setAvatars(string $avatars): void
    {
        $this->avatars = $avatars;
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
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int|null
     */
    public function getIsAdministrator(): ?int
    {
        return $this->isAdministrator;
    }

    /**
     * @param int|null $isAdministrator
     */
    public function setIsAdministrator(?int $isAdministrator): void
    {
        $this->isAdministrator = $isAdministrator;
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
     * @return string|null
     */
    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    /**
     * @param string|null $nickname
     */
    public function setNickname(?string $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getRemark(): ?string
    {
        return $this->remark;
    }

    /**
     * @param string|null $remark
     */
    public function setRemark(?string $remark): void
    {
        $this->remark = $remark;
    }

    /**
     * @return string|null
     */
    public function getSalt(): ?string
    {
        return $this->salt;
    }

    /**
     * @param string|null $salt
     */
    public function setSalt(?string $salt): void
    {
        $this->salt = $salt;
    }

    /**
     * @return int|null
     */
    public function getSex(): ?int
    {
        return $this->sex;
    }

    /**
     * @param int|null $sex
     */
    public function setSex(?int $sex): void
    {
        $this->sex = $sex;
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
     * @return int|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }





}
