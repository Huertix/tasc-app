<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="vendedor")
 */
class Vendedor  implements UserInterface
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="utf8string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $codigo;
  /**
   * @ORM\Column(type="utf8string", length=30, options={"fixed" = true}, nullable=false)
   */
  private $nombre;
  /**
   * @ORM\Column(type="string", length=10, options={"fixed" = true}, nullable=false)
   */
  private $password;


  /**
   * @return mixed
   */
  public function getCodigo() {
    return $this->codigo;
  }

  /**
   * @return mixed
   */
  public function getNombre() {
    return $this->nombre;
  }

  /**
   * @return mixed
   */
  public function getPassword() {
    return $this->password;
  }


  /**
   * Returns the roles granted to the user.
   *
   * <code>
   * public function getRoles()
   * {
   *     return array('ROLE_USER');
   * }
   * </code>
   *
   * Alternatively, the roles might be stored on a ``roles`` property,
   * and populated in any number of different ways when the user object
   * is created.
   *
   * @return (Role|string)[] The user roles
   */
  public function getRoles() {
    return ['ROLE_USER'];
  }

  /**
   * Returns the salt that was originally used to encode the password.
   *
   * This can return null if the password was not encoded using a salt.
   *
   * @return string|null The salt
   */
  public function getSalt() {
    // TODO: Implement getSalt() method.
  }

  /**
   * Returns the username used to authenticate the user.
   *
   * @return string The username
   */
  public function getUsername() {
      return $this->nombre;
  }

  /**
   * Removes sensitive data from the user.
   *
   * This is important if, at any given point, sensitive information like
   * the plain-text password is stored on this object.
   */
  public function eraseCredentials() {
    // TODO: Implement eraseCredentials() method.
  }
}