/**
 * French translation
 * @author Régis Guyomarch <regisg@gmail.com>
 * @version 2011-07-11
 */
if (elFinder && elFinder.prototype && typeof(elFinder.prototype.i18) == 'object') {
	elFinder.prototype.i18.fr = {
		translator : 'Régis Guyomarch &lt;regisg@gmail.com&gt;',
		language   : 'française',
		direction  : 'ltr',
		messages   : {
			
			/********************************** errors **********************************/
			'error'                : 'Erreur',
			'errUnknown'           : 'Erreur inconnue.',
			'errUnknownCmd'        : 'Commande inconnue.',
			'errJqui'              : 'Mauvaise configuration de jQuery UI. Les composants Selectable, draggable et droppable doivent être inclus.',
			'errNode'              : 'elFinder requiert que l\'élément DOM ait été créé.',
			'errURL'               : 'Mauvaise configuration d\'elFinder ! L\'option URL n\a pas été définie.',
			'errAccess'            : 'Accès refusé.',
			'errConnect'           : 'Impossible de se connecter au backend.',
			'errAbort'             : 'Connexion interrompue.',
			'errTimeout'           : 'Délai de connexion dépassé.',
			'errNotFound'          : 'Backend non trouvé.',
			'errResponse'          : 'Mauvaise réponse du backend.',
			'errConf'              : 'Mauvaise configuration du backend.',
			'errJSON'              : 'Le module PHP JSON n\'est pas installé.',
			'errNoVolumes'         : 'Aucun volume lisible.',
			'errCmdParams'         : 'Mauvais Paramétrage de la commande "$1".',
			'errDataNotJSON'       : 'Les données ne sont pas au format JSON.',
			'errDataEmpty'         : 'Données inexistantes.',
			'errCmdReq'            : 'La requête au Backend doit comporter le nom de la commande.',
			'errOpen'              : 'Impossible d\'ouvrir "$1".',
			'errNotFolder'         : 'Cet objet n\'est pas un dossier.',
			'errNotFile'           : 'Cet objet n\'est pas un fichier.',
			'errRead'              : 'Impossible de lire "$1".',
			'errWrite'             : 'Impossible d\'écrire dans "$1".',
			'errPerm'              : 'Permission refusée.',
			'errLocked'            : '"$1" est verrouillé et ne peut être déplace ou supprimé.',
			'errExists'            : 'Un fichier nommé "$1" existe déjà.',
			'errInvName'           : 'Nom de fichier incorrect.',
			'errFolderNotFound'    : 'Dossier non trouvé.',
			'errFileNotFound'      : 'Fichier non trouvé.',
			'errTrgFolderNotFound' : 'Dossier destination "$1" non trouvé.',
			'errPopup'             : 'Le navigateur web a empêché l\'ouverture d\'une fenêtre "popup". Pour ouvrir le fichier, modifiez les options du navigateur web.',
			'errMkdir'             : 'Impossible de créer le dossier "$1".',
			'errMkfile'            : 'impossible de créer le fichier "$1".',
			'errRename'            : 'Impossible de renommer "$1".',
			'errCopyFrom'          : 'Interdiction de copier des fichiers depuis le volume "$1".',
			'errCopyTo'            : 'Interdiction copier des fichiers vers le volume "$1".',
			'errUploadCommon'      : 'Erreur lors de l\'envoi du fichier.',
			'errUpload'            : 'Impossible d\'envoyer "$1".',
			'errUploadNoFiles'     : 'Aucun fichier a envoyer.',
			'errMaxSize'           : 'Les données dépassent la taille maximale allouée.',
			'errFileMaxSize'       : 'Le fichier dépasse la taille maximale allouée.',
			'errUploadMime'        : 'Type de fichier non autorisé.',
			'errUploadTransfer'    : '"$1" erreur transfert.', 
			'errSave'              : 'Impossible de sauvegarder "$1".',
			'errCopy'              : 'Impossible de copier "$1".',
			'errMove'              : 'Impossible de déplacer "$1".',
			'errCopyInItself'      : 'Impossible de copier "$1" sur lui-même.',
			'errRm'                : 'Impossible de supprimer "$1".',
			'errExtract'           : 'Impossible d\'extraire les fichier de "$1".',
			'errArchive'           : 'Impossible de créer l\'archive.',
			'errArcType'           : 'Type d\'archive non supporté.',
			'errNoArchive'         : 'Le fichier n\'est pas une archive, ou c\'est un type d\'archive non supporté.',
			'errCmdNoSupport'      : 'Le Backend ne prend pas en charge cette commande.',
			'errReplByChild'       : 'Le dossier “$1” ne peut pas être remplacé par un élément qu\'il contient.',
			'errArcSymlinks'       : 'Par mesure de sécurité, il est défendu d\'extraire une archive contenant des liens symboliques.',
			'errArcMaxSize'        : 'Les fichiers de l\'archive excèdent la taille maximale autorisée.',
			
			/******************************* commands names ********************************/
			'cmdarchive'   : 'Créer une archive',
			'cmdback'      : 'Précédent',
			'cmdcopy'      : 'Copier',
			'cmdcut'       : 'Couper',
			'cmddownload'  : 'Télécharger',
			'cmdduplicate' : 'Dupliquer',
			'cmdedit'      : 'Éditer le fichier',
			'cmdextract'   : 'Extraire les fichiers de l\'archive',
			'cmdforward'   : 'Suivant',
			'cmdgetfile'   : 'Sélectionner les fichiers',
			'cmdhelp'      : 'À propose de ce logiciel',
			'cmdhome'      : 'Accueil',
			'cmdinfo'      : 'Informations',
			'cmdmkdir'     : 'Nouveau dossier',
			'cmdmkfile'    : 'Nouveau fichier texte',
			'cmdopen'      : 'Ouvrir',
			'cmdpaste'     : 'Coller',
			'cmdquicklook' : 'Prévisualiser',
			'cmdreload'    : 'Actualiser',
			'cmdrename'    : 'Renommer',
			'cmdrm'        : 'Supprimer',
			'cmdsearch'    : 'Trouver les fichiers',
			'cmdup'        : 'Remonter au dossier parent',
			'cmdupload'    : 'Envoyer les fichiers',
			'cmdview'      : 'Vue',
			'cmdresize'    : 'Redimmensionner l\'image',
			'cmdsort'      : 'Trier',
			
			/*********************************** buttons ***********************************/ 
			'btnClose'  : 'Fermer',
			'btnSave'   : 'Sauvegarder',
			'btnRm'     : 'Supprimer',
			'btnCancel' : 'Annuler',
			'btnNo'     : 'Non',
			'btnYes'    : 'Oui',
			
			/******************************** notifications ********************************/
			'ntfopen'     : 'Ouverture du dossier',
			'ntffile'     : 'Ouverture du fichier',
			'ntfreload'   : 'Actualiser le contenu du dossier',
			'ntfmkdir'    : 'Création du dossier',
			'ntfmkfile'   : 'Création des fichiers',
			'ntfrm'       : 'Supprimer les fichiers',
			'ntfcopy'     : 'Copier les fichiers',
			'ntfmove'     : 'Déplacer les fichiers',
			'ntfprepare'  : 'Préparation de la copie des fichiers',
			'ntfrename'   : 'Renommer les fichier',
			'ntfupload'   : 'Envoyer les fichiers',
			'ntfdownload' : 'Télécharger les fichiers',
			'ntfsave'     : 'Sauvegarde des fichiers',
			'ntfarchive'  : 'Création de l\'archive',
			'ntfextract'  : 'Extraction des fichiers de l\'archive',
			'ntfsearch'   : 'Recherche des fichiers',
			'ntfsmth'     : 'Fait quelque chose >_<',
			
			/************************************ dates **********************************/
			'dateUnknown' : 'Inconnue',
			'Today'       : 'Aujourd\'hui',
			'Yesterday'   : 'Hier',
			'Jan'         : 'Jan',
			'Feb'         : 'Fév',
			'Mar'         : 'Mar',
			'Apr'         : 'Avr',
			'May'         : 'Mai',
			'Jun'         : 'Jun',
			'Jul'         : 'Jul',
			'Aug'         : 'Aoû',
			'Sep'         : 'Sep',
			'Oct'         : 'Oct',
			'Nov'         : 'Nov',
			'Dec'         : 'Déc',

			/******************************** sort variants ********************************/
			'sortnameDirsFirst' : 'par nom (dossiers en premier)', 
			'sortkindDirsFirst' : 'par type (dossiers en premier)', 
			'sortsizeDirsFirst' : 'par taille (dossiers en premier)', 
			'sortdateDirsFirst' : 'par date (dossiers en premier)', 
			'sortname'          : 'par nom', 
			'sortkind'          : 'par type', 
			'sortsize'          : 'par taille',
			'sortdate'          : 'par date',

			/********************************** messages **********************************/
			'confirmReq'      : 'Confirmation requise',
			'confirmRm'       : 'Êtes-vous certain de vouloir supprimer les fichiers?<br/>Cela ne peut être annulé!',
			'confirmRepl'     : 'Supprimer l\'ancien fichier par le nouveau?',
			'apllyAll'        : 'Appliquer à tous',
			'name'            : 'Nom',
			'size'            : 'Taille',
			'perms'           : 'Permissions',
			'modify'          : 'Modifié',
			'kind'            : 'Type',
			'read'            : 'Lecture',
			'write'           : 'Écriture',
			'noaccess'        : 'Pas d\'accès',
			'and'             : 'et',
			'unknown'         : 'inconnu',
			'selectall'       : 'Sélectionner tous les fichiers',
			'selectfiles'     : 'Sélectionner le(s) fichier(s)',
			'selectffile'     : 'Sélectionner le premier fichier',
			'selectlfile'     : 'Sélectionner le dernier fichier',
			'viewlist'        : 'Vue listing',
			'viewicons'       : 'Vue icônes',
			'places'          : 'Places',
			'calc'            : 'Calcul', 
			'path'            : 'Chemin',
			'aliasfor'        : 'Raccourcis pour',
			'locked'          : 'Verrouillé',
			'dim'             : 'Dimensions',
			'files'           : 'Fichiers',
			'folders'         : 'Dossiers',
			'items'           : 'Éléments',
			'yes'             : 'oui',
			'no'              : 'non',
			'link'            : 'Lien',
			'searcresult'     : 'Résultat de la recherche',  
			'selected'        : 'Éléments sélectionnés',
			'about'           : 'À propos',
			'shortcuts'       : 'Raccourcis',
			'help'            : 'Aide',
			'webfm'           : 'Gestionnaire de fichier Web',
			'ver'             : 'Version',
			'protocol'        : 'Version du protocole',
			'homepage'        : 'Page du projet',
			'docs'            : 'Documentation',
			'github'          : 'Forker-nous sur Github',
			'twitter'         : 'Suivez nous sur twitter',
			'facebook'        : 'Joignez-nous facebook',
			'team'            : 'Équipe',
			'chiefdev'        : 'Développeur en chef',
			'developer'       : 'Développeur',
			'contributor'     : 'Contributeur',
			'maintainer'      : 'Mainteneur',
			'translator'      : 'Traducteur',
			'icons'           : 'Icônes',
			'dontforget'      : 'et n\'oubliez pas votre serviette',
			'shortcutsof'     : 'Raccourcis désactivés',
			'dropFiles'       : 'Déposez les fichiers ici',
			'or'              : 'ou',
			'selectForUpload' : 'Sélectionner les fichiers à envoyer',
			'moveFiles'       : 'Déplacer les fichiers',
			'copyFiles'       : 'Copier les fichiers',
			'rmFromPlaces'    : 'Remove from places',
			'untitled folder' : 'dossier sans nom',
			'untitled file.txt' : 'sans nom file.txt',
			
			/********************************** mimetypes **********************************/
			'kindUnknown'     : 'Inconnu',
			'kindFolder'      : 'Dossier',
			'kindAlias'       : 'Raccourcis',
			'kindAliasBroken' : 'Raccourcis cassé',
			// applications
			'kindApp'         : 'Application',
			'kindPostscript'  : 'Document Postscript',
			'kindMsOffice'    : 'Document Microsoft Office',
			'kindMsWord'      : 'Document Microsoft Word',
			'kindMsExcel'     : 'Document Microsoft Excel',
			'kindMsPP'        : 'Présentation Microsoft Powerpoint',
			'kindOO'          : 'Document Open Office',
			'kindAppFlash'    : 'Application flash',
			'kindPDF'         : 'Portable Document Format (PDF)',
			'kindTorrent'     : 'Fichier Bittorrent',
			'kind7z'          : 'Archive 7z',
			'kindTAR'         : 'Archive TAR',
			'kindGZIP'        : 'Archive GZIP',
			'kindBZIP'        : 'Archive BZIP',
			'kindZIP'         : 'Archive ZIP',
			'kindRAR'         : 'Archive RAR',
			'kindJAR'         : 'Fichier Java JAR',
			'kindTTF'         : 'Police True Type',
			'kindOTF'         : 'Police Open Type',
			'kindRPM'         : 'Package RPM',
			// texts
			'kindText'        : 'Document Text',
			'kindTextPlain'   : 'Texte non formaté',
			'kindPHP'         : 'Source PHP',
			'kindCSS'         : 'Cascading style sheet',
			'kindHTML'        : 'Document HTML',
			'kindJS'          : 'Source Javascript',
			'kindRTF'         : 'Rich Text Format',
			'kindC'           : 'Source C',
			'kindCHeader'     : 'Source header C',
			'kindCPP'         : 'Source C++',
			'kindCPPHeader'   : 'Source header C++',
			'kindShell'       : 'Shell script Unix',
			'kindPython'      : 'Source Python',
			'kindJava'        : 'Source Java',
			'kindRuby'        : 'Source Ruby',
			'kindPerl'        : 'Script Perl',
			'kindSQL'         : 'Source SQL',
			'kindXML'         : 'Document XML',
			'kindAWK'         : 'Source AWK',
			'kindCSV'         : 'CSV',
			'kindDOCBOOK'     : 'Document Docbook XML',
			// images
			'kindImage'       : 'Image',
			'kindBMP'         : 'Image BMP',
			'kindJPEG'        : 'Image JPEG',
			'kindGIF'         : 'Image GIF',
			'kindPNG'         : 'Image PNG',
			'kindTIFF'        : 'Image TIFF',
			'kindTGA'         : 'Image TGA',
			'kindPSD'         : 'Image Adobe Photoshop',
			'kindXBITMAP'     : 'Image X bitmap',
			'kindPXM'         : 'Image Pixelmator',
			// media
			'kindAudio'       : 'Son',
			'kindAudioMPEG'   : 'Son MPEG',
			'kindAudioMPEG4'  : 'Son MPEG-4',
			'kindAudioMIDI'   : 'Son MIDI',
			'kindAudioOGG'    : 'Son Ogg Vorbis',
			'kindAudioWAV'    : 'Son WAV',
			'AudioPlaylist'   : 'Liste de lecture audio',
			'kindVideo'       : 'Vidéo',
			'kindVideoDV'     : 'Vidéo DV',
			'kindVideoMPEG'   : 'Vidéo MPEG',
			'kindVideoMPEG4'  : 'Vidéo MPEG-4',
			'kindVideoAVI'    : 'Vidéo AVI',
			'kindVideoMOV'    : 'Vidéo Quick Time',
			'kindVideoWM'     : 'Vidéo Windows Media',
			'kindVideoFlash'  : 'Vidéo Flash',
			'kindVideoMKV'    : 'Vidéo Matroska',
			'kindVideoOGG'    : 'Vidéo Ogg'
		}
	}
}
