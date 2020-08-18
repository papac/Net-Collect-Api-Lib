ROUTE: /Auth
PAYLOAD:
{"Key":"test","Secret":"test"}
RESPONSE:
{ "Token":"eWE9T6MrWaKNrDIoD2jsA089tATY0rV8PTwPQrs0ar6vT1or81VM7WZoRO8DYtrTusp9q02o60S5tE0O2D9MUzPYjo7jn9eo7yY8", "Code":200, "Contenu":"Connexion reussie" }

[Inscription avec un autre numéro]
ROUTE: /Inscription
PAYLOAD:
{"token":"eWE9T6MrWaKNrDIoD2jsA089tATY0rV8PTwPQrs0ar6vT1or81VM7WZoRO8DYtrTusp9q02o60S5tE0O2D9MUzPYjo7jn9eo7yY8","Nom":"DAKIA","Prenom":"Franck","TelPrincipal":"84497105","IDCivilite":1,"TelReinitilisation":"52797005"}
RESPONSE:
{"fault" : {"faultcode" : "server", "faultstring" : "Erreur renvoyée par le serveur <localhost:4900> :\nImpossible d'accéder au fichier.\nLa description de <Client> stockée dans l'analyse est incompatible avec celle 
de <e:\\ServeurHFSQL BMICI\\BDD\\TRESOR_MONEY\\Client>.\nLa rubrique clé unique <IdTelPrincipal> n'existe pas dans l'analyse.\nLes descriptions ne sont pas compatibles car il y a un risque d'erreurs de doublons lors 
des ajouts.", "detail" : "Appel WL :\nTraitement de 'Procédure globale Inscription (serveur)' (ProcéduresServeur.Inscription), ligne 24\nFonction 'HLitRecherchePremier', syntaxe 0\n\nQue s'est-il passé ?\nErreur renvoyée par le serveur <localhost:4900> :\nImpossible d'accéder au fichier.\nLa description de <Client> stockée dans l'analyse est incompatible avec celle de <e:\\ServeurHFSQL BMICI\\BDD\\TRESOR_MONEY\\Client>.\nLa rubrique clé unique <IdTelPrincipal> n'existe pas dans l'analyse.\nLes descriptions ne sont pas compatibles car il y a un risque d'erreurs de doublons lors des ajouts.\n\nCode erreur : 70016\nNiveau : erreur fatale\nCode erreur WD55 : 16\n\nDump de l'erreur du module 'WDHFSRV64.DLL' (25.0.277.1).\nIdentifiant des informations détaillées (.err) : 72136\nInformations de débogage :\nIEWDHFSRV=32.10\nModule=<WDHFSRV>\nVersion=<25.0.277.1>\nFonction (7,12)\nInformations supplémentaires :\nEIT_TYPE_WDFILE : <7>\nEIT_IDCODE : <458752>\nEIT_LOGICALTABLENAME : <Client>\nEIT_PATHFIC : <e:\\ServeurHFSQL BMICI\\BDD\\TRESOR_MONEY\\Client>\nEIT_SERVEURCS : <localhost:4900>\nEIT_PILEWL :\nProcédure globale Inscription (serveur) (ProcéduresServeur.Inscription), ligne 24\nEIT_DATEHEURE : 18/08/2020 18:56:33\nEIT_CODEHTTP : <500>"}}


[Normalement cette route n'est pas disponible vue que la demande de Retrait a échoué]
ROUTE: /ValidationInscription
PAYLOAD:
{"token":"eWE9T6MrWaKNrDIoD2jsA089tATY0rV8PTwPQrs0ar6vT1or81VM7WZoRO8DYtrTusp9q02o60S5tE0O2D9MUzPYjo7jn9eo7yY8","code":"1GYY"}
RESPONSE:
{ "sNumTel":"", "nCode":900, "sContenu":"Token inactif, veuillez vous authentifier." }


ROUTE: /SoldeClient/49929598/eWE9T6MrWaKNrDIoD2jsA089tATY0rV8PTwPQrs0ar6vT1or81VM7WZoRO8DYtrTusp9q02o60S5tE0O2D9MUzPYjo7jn9eo7yY8
RESPONSE:
{"fault" : {"faultcode" : "server", "faultstring" : "Erreur renvoyée par le serveur <localhost:4900> :\nImpossible d'accéder au fichier.\nLa description de <Client> stockée dans l'analyse est incompatible avec celle 
de <e:\\ServeurHFSQL BMICI\\BDD\\TRESOR_MONEY\\Client>.\nLa rubrique clé unique <IdTelPrincipal> n'existe pas dans l'analyse.\nLes descriptions ne sont pas compatibles car il y a un risque d'erreurs de doublons lors 
des ajouts.", "detail" : "Appel WL :\nTraitement de 'Procédure globale SoldeClient (serveur)' (ProcéduresServeur.SoldeClient), ligne 10\nFonction 'HLitRecherche', syntaxe 0\n\nQue s'est-il passé ?\nErreur renvoyée par le serveur <localhost:4900> :\nImpossible d'accéder au fichier.\nLa description de <Client> stockée dans l'analyse est incompatible avec celle de <e:\\ServeurHFSQL BMICI\\BDD\\TRESOR_MONEY\\Client>.\nLa rubrique clé unique <IdTelPrincipal> n'existe pas dans l'analyse.\nLes descriptions ne sont pas compatibles car il y a un risque d'erreurs de doublons lors des ajouts.\n\nCode erreur : 70016\nNiveau : erreur fatale\nCode erreur WD55 : 16\n\nDump de l'erreur du module 'WDHFSRV64.DLL' (25.0.277.1).\nIdentifiant des informations détaillées (.err) : 72136\nInformations de débogage :\nIEWDHFSRV=32.10\nModule=<WDHFSRV>\nVersion=<25.0.277.1>\nFonction (7,118)\nInformations supplémentaires :\nEIT_TYPE_WDFILE : <7>\nEIT_IDCODE : <458752>\nEIT_LOGICALTABLENAME : <Client>\nEIT_PATHFIC : <e:\\ServeurHFSQL BMICI\\BDD\\TRESOR_MONEY\\Client>\nEIT_SERVEURCS : <localhost:4900>\nEIT_PILEWL :\nProcédure globale SoldeClient (serveur) (ProcéduresServeur.SoldeClient), ligne 10\nEIT_DATEHEURE : 18/08/2020 18:56:43\nEIT_CODEHTTP : <500>"}}

[Utilisé comme dans la documentation]
ROUTE: /netCollect/Contribuable/code/2/Samer
RESPONSE:
{"fault" : {"faultcode" : "client", "faultstring" : "Aucun point d'entrée n'a été trouvé pour la ressource /netCollect/Contribuable/code/2/Samer.", "detail" : "Que s'est-il passé ?\nAucun point d'entrée n'a été trouvé pour la ressource /netCollect/Contribuable/code/2/Samer.\n\nCode erreur : 620021\nNiveau : erreur fatale\n\nDump de l'erreur du module 'wd240awws64.dll' (24.0.86.0).\nInformations supplémentaires :\nEIT_CODEHTTP : 
<404>"}}


ROUTE: /netCollect/Contribuable/1
RESPONSE:
{ "tabListeCommune":[  ], "codEtat":401, "mesRetour":" Token inactif" }


ROUTE: /netCollect/Contribuable/1/1
RESPONSE:
{ "listeActivi":[  ], "messaRetour":" Token inactif", "codeEtat":401 }


ROUTE: /netCollect/Taxes/1/1
RESPONSE:
{ "listeActivi":[  ], "messaRetour":" Token inactif", "codeEtat":401 }


ROUTE: /Demande/Operation
PAYLOAD:
{"token":"eWE9T6MrWaKNrDIoD2jsA089tATY0rV8PTwPQrs0ar6vT1or81VM7WZoRO8DYtrTusp9q02o60S5tE0O2D9MUzPYjo7jn9eo7yY8","typeOperation":"Depot","montant":"2547880","numclient":"49929598"}
RESPONSE:
{ "cleretour":" Token inactif", "code":401 }


ROUTE: /Demande/Operation
PAYLOAD:
{"token":"eWE9T6MrWaKNrDIoD2jsA089tATY0rV8PTwPQrs0ar6vT1or81VM7WZoRO8DYtrTusp9q02o60S5tE0O2D9MUzPYjo7jn9eo7yY8","typeOperation":"Retrait","montant":"2547880","numclient":"49929598"}
RESPONSE:
{ "cleretour":" Token inactif", "code":401 }


[Normalement cette route n'est pas disponible vue que la demande de Retrait a échoué]
ROUTE: /Client/Debiter
PAYLOAD:
{"token":"eWE9T6MrWaKNrDIoD2jsA089tATY0rV8PTwPQrs0ar6vT1or81VM7WZoRO8DYtrTusp9q02o60S5tE0O2D9MUzPYjo7jn9eo7yY8","codeTransaction":"2547880"}
RESPONSE:
{"fault" : {"faultcode" : "server", "faultstring" : "Erreur renvoyée par le serveur <localhost:4900> :\nImpossible d'accéder au fichier.\nLa description de <Client> stockée dans l'analyse est incompatible avec celle 
de <e:\\ServeurHFSQL BMICI\\BDD\\TRESOR_MONEY\\Client>.\nLa rubrique clé unique <IdTelPrincipal> n'existe pas dans l'analyse.\nLes descriptions ne sont pas compatibles car il y a un risque d'erreurs de doublons lors 
des ajouts.", "detail" : "Appel WL :\nTraitement de 'Procédure globale debiteClient (serveur)' (ProcéduresServeur.debiteClient), ligne 99\n\nQue s'est-il passé ?\nErreur renvoyée par le serveur <localhost:4900> :\nImpossible d'accéder au fichier.\nLa description de <Client> stockée dans l'analyse est incompatible avec celle de <e:\\ServeurHFSQL BMICI\\BDD\\TRESOR_MONEY\\Client>.\nLa rubrique clé unique <IdTelPrincipal> n'existe 
pas dans l'analyse.\nLes descriptions ne sont pas compatibles car il y a un risque d'erreurs de doublons lors des ajouts.\n\nCode erreur : 70016\nNiveau : erreur fatale\nCode erreur WD55 : 16\n\nDump de l'erreur du module 'WDHFSRV64.DLL' (25.0.277.1).\nIdentifiant des informations détaillées (.err) : 72136\nInformations de débogage :\nIEWDHFSRV=32.10\nModule=<WDHFSRV>\nVersion=<25.0.277.1>\nInformations supplémentaires :\nEIT_TYPE_WDFILE : <7>\nEIT_IDCODE : <458752>\nEIT_LOGICALTABLENAME : <Client>\nEIT_PATHFIC : <e:\\ServeurHFSQL BMICI\\BDD\\TRESOR_MONEY\\Client>\nEIT_SERVEURCS : <localhost:4900>\nEIT_PILEWL :\nProcédure globale debiteClient (serveur) (ProcéduresServeur.debiteClient), ligne 99\nEIT_DATEHEURE : 18/08/2020 18:57:07\nEIT_CODEHTTP : <500>"}}

Note:
Veuillez considérer les messages d'erreurs au niveau de RESPONSE.