<?php

namespace App\Tools;

class FileTools
{

  // Fonction pour vérifier si le fichier téléchargé est bien présent
  public static function isUploadSuccessful(array $uploadedFile): bool
  {
    return isset($uploadedFile['error']) && $uploadedFile['error'] === UPLOAD_ERR_OK;
  }

  // Fonction pour vérifier si le fichier téléchargé est inférieur à 2Mo
  public static function isUploadSmallerThan2M(array $uploadedFile): bool
  {
    return $uploadedFile['size'] < 2000000;
  }

  // Fonction pour vérifier si le type MIME du fichier téléchargé est autorisé
  public static function isMimeTypeAuthorized(array $authorizedMimeTypes, array $uploadedFile): bool
  {
    $finfo = new \finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($uploadedFile['tmp_name']);

    return in_array($mimeType, $authorizedMimeTypes, true);
  }

  // Fonction pour obtenir l'extension du fichier téléchargé à partir du type MIME
  public static function getExtensionFromMimeType(array $authorizedMimeTypes, array $uploadedFile): string
  {
    $finfo = new \finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($uploadedFile['tmp_name']);

    if ($extension = array_search($mimeType, $authorizedMimeTypes, true)) {
      return $extension;
    }
    throw new \Exception('Le type MIME n\'est lié à aucune extension');
  }

  // Fonction pour déplacer le fichier téléchargé vers le dossier '/uploads/avatar' du serveur et supprimer l'ancien fichier fichier si il est renseigné
  public static function moveUploadedFile(array $uploadedFile, string $fileName, string $oldFileName = null): bool
  {
    if (move_uploaded_file($uploadedFile['tmp_name'], _AVATAR_IMAGES_FOLDER_ . $fileName)) {
      if ($oldFileName !== null) {
        unlink(_AVATAR_IMAGES_FOLDER_ . $oldFileName);
      }
    }
    return true;
  }
}
