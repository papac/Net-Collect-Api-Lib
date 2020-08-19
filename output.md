# CREATION DE COMPTE
ROUTE: /Auth
PAYLOAD:
{"Key":"test","Secret":"test"}
RESPONSE:
{ "Token":"oekRenevzs9fsInDe0uzyZy1Q06M00qr1Pv0mnygWkMQP2ohUKXshWG20Ls4CKryPN04W0Ywfa585MJngRXt1J0oteoyaToKycab", "Code":200, "Contenu":"Connexion reussie" }

ROUTE: /Inscription
PAYLOAD:
{"token":"oekRenevzs9fsInDe0uzyZy1Q06M00qr1Pv0mnygWkMQP2ohUKXshWG20Ls4CKryPN04W0Ywfa585MJngRXt1J0oteoyaToKycab","Nom":"DAKIA","Prenom":"Franck","TelPrincipal":"49929598","IDCivilite":1,"TelReinitilisation":"52797005"}
RESPONSE:
{ "nCode":200, "sContenu":"Un code de validation de l ouverture de compte est envoye au client." }

# API CONTRIBUABLE
ROUTE: /Auth
PAYLOAD:
{"Key":"test","Secret":"test"}
RESPONSE:
{ "Token":"b6h2Ve1119r6s2a7XPJcai9boPgusYr0hje8sxpYcyvFMazeV1yanPWt0dPUVsrIrVp7tKQreHjsKtNprP85c1ryg73srssys26r", "Code":200, "Contenu":"Connexion reussie" }

ROUTE: /netCollect/Contribuable/1/2/BAE1501926181/b6h2Ve1119r6s2a7XPJcai9boPgusYr0hje8sxpYcyvFMazeV1yanPWt0dPUVsrIrVp7tKQreHjsKtNprP85c1ryg73srssys26r
RESPONSE:
{ "nIdContrCarte":7333, "sNomContrCarte":"KOUASSI KOUAKOU ISIDORE", "sNumcarteContrCarte":"BAE1501926181", "sTelPrincipal":"04930119", "sProffession":"COMMERCANT", "sDateNaissanceContrcarte":"07\/08\/1989", "sResulat":"", "nCodeEtat":200 }

ROUTE: /netCollect/BAE1501926181/b6h2Ve1119r6s2a7XPJcai9boPgusYr0hje8sxpYcyvFMazeV1yanPWt0dPUVsrIrVp7tKQreHjsKtNprP85c1ryg73srssys26r
RESPONSE:
{ "tabListeCommune":[ { "sNomCommune":"MAIRIE D ABENGOUROU", "nIdcommune":24 }, { "sNomCommune":"MAIRIE DE BINGERVILLE", "nIdcommune":2 }, { "sNomCommune":"REGION DE SAN-PEDRO", "nIdcommune":17 }, { "sNomCommune":"REGION DE SAN-PEDRO", "nIdcommune":17 }, { "sNomCommune":"MAIRIE DE BINGERVILLE", "nIdcommune":2 } ], "codEtat":200, "mesRetour":"" }

ROUTE: /netCollect/BAE1501926181/24/b6h2Ve1119r6s2a7XPJcai9boPgusYr0hje8sxpYcyvFMazeV1yanPWt0dPUVsrIrVp7tKQreHjsKtNprP85c1ryg73srssys26r
RESPONSE:
{ "listeActivi":[ { "nIdActivite":281474976745619, "sNomActivite":"NEANT", "sSituationGeo":"Marche cafetou", "sTypeActivite":"VENTE" } ], "messaRetour":"Liste des activit\u00e9s", "codeEtat":200 }

ROUTE: /netCollect/Taxes/7333/7333/b6h2Ve1119r6s2a7XPJcai9boPgusYr0hje8sxpYcyvFMazeV1yanPWt0dPUVsrIrVp7tKQreHjsKtNprP85c1ryg73srssys26r
RESPONSE:
{ "tabListeTaxe":[ { "nIdLiaison":49577, "sLibelleTaxe":"TAXE FORFAITAIRE 1", "nMontantTaxe":1500, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2020 }, { "nIdLiaison":49579, "sLibelleTaxe":"TAXE FORFAITAIRE 3", "nMontantTaxe":3000, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2020 }, { "nIdLiaison":49582, "sLibelleTaxe":"AFFICHE PEINTE", "nMontantTaxe":2000, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2020 }, { "nIdLiaison":49584, "sLibelleTaxe":"TAXE SUR LA PUBLICITE 1", "nMontantTaxe":3000, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2020 }, { "nIdLiaison":29875, "sLibelleTaxe":"ODP", "nMontantTaxe":3000, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2020 }, { "nIdLiaison":29876, "sLibelleTaxe":"TAXE FORFAITAIRE 1", "nMontantTaxe":1500, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2020 }, { "nIdLiaison":29877, "sLibelleTaxe":"TAXE FORFAITAIRE 3", "nMontantTaxe":2500, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2020 }, { "nIdLiaison":29878, "sLibelleTaxe":"TAXE FORFAITAIRE 5", "nMontantTaxe":2500, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2020 }, { "nIdLiaison":29879, "sLibelleTaxe":"TAXE PUBLICITE", "nMontantTaxe":5000, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2020 }, { "nIdLiaison":47616, "sLibelleTaxe":"ODP 2", "nMontantTaxe":1500, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2020 }, { "nIdLiaison":47617, "sLibelleTaxe":"ODP 3", "nMontantTaxe":6500, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2020 }, { "nIdLiaison":47619, "sLibelleTaxe":"TAXE SUR LA PUBLICIT\u00c9 2", "nMontantTaxe":1000, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2020 }, { "nIdLiaison":40977, "sLibelleTaxe":"TAXE DE STATIONNEMENT", "nMontantTaxe":5000, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2020 }, { "nIdLiaison":39287, "sLibelleTaxe":"TAXE FORFAITAIRE 2", "nMontantTaxe":2000, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2020 }, { "nIdLiaison":14165, "sLibelleTaxe":"TAXE FORFAITAIRE 2", "nMontantTaxe":2000, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2018 }, { "nIdLiaison":12390, "sLibelleTaxe":"TAXE FORFAITAIRE 4", "nMontantTaxe":4000, "sPeriodicite":"MENSUELLE", "nIdActivite":7333, "nAnneeExecution":2018 } ], "nIdContrCarte":0, "codeEtat":200, "mesRetour":"" 

ROUTE: /Auth
PAYLOAD:
{"Key":"test","Secret":"test"}
RESPONSE:
{ "Token":"eMoT230mrsUr6sIUj0ronVEZ10Axj8R12nbJyu1n2e07qP0CcsJsHrn0ezetiVhUA58h09U2ng64PsBbs8irkpGRixPk719132cA", "Code":200, "Contenu":"Connexion reussie" }

ROUTE: /netCollect/paiementTaxe/49577/49929598/eMoT230mrsUr6sIUj0ronVEZ10Axj8R12nbJyu1n2e07qP0CcsJsHrn0ezetiVhUA58h09U2ng64PsBbs8irkpGRixPk719132cA
RESPONSE:
{ "reference":"D32N6FLF615HRC", "datePaiement":"0019-08-20T20:01:07.002", "codeEat":200, "response":"OK", "periodePaye":"FEVRIER" }

# API DISPOSIT
ROUTE: /Auth
PAYLOAD:
{"Key":"test","Secret":"test"}
RESPONSE:
{ "Token":"kLP0TIr8TrtceDwzs4Tesd98Ntk5fRdFLO0j2phF1VMeneReqPPtasP0BpDes0t9RrK83Y0etX7iiWPg05U9jHUa008L1ss0WEVc", "Code":200, "Contenu":"Connexion reussie" }

ROUTE: /Demande/Operation
PAYLOAD:
{"tokenP":"kLP0TIr8TrtceDwzs4Tesd98Ntk5fRdFLO0j2phF1VMeneReqPPtasP0BpDes0t9RrK83Y0etX7iiWPg05U9jHUa008L1ss0WEVc","typeOperation":"Depot","montant":"50000","numclient":"49929598"}
RESPONSE:
{ "cleretour":"Le depot de50000 sur le numero: 49929598 a ete effectue avec succes", "code":200 }

ROUTE: /Auth
PAYLOAD:
{"Key":"test","Secret":"test"}
RESPONSE:
{ "Token":"9XgvauauVoe3Ss12ejeLBltX17zsKl1JKtMX8r1onTs1X60MF02TsTqossspFfr95fs509AXoTlqYu0tu8cb2Ke1JtvmFsy2qeZ4", "Code":200, "Contenu":"Connexion reussie" }

# API RETRAIT
ROUTE: /Demande/Operation
PAYLOAD:
{"tokenP":"9XgvauauVoe3Ss12ejeLBltX17zsKl1JKtMX8r1onTs1X60MF02TsTqossspFfr95fs509AXoTlqYu0tu8cb2Ke1JtvmFsy2qeZ4","typeOperation":"Retrait","montant":"3000","numclient":"49929598"}
RESPONSE:
{ "cleretour":"Un code de validation est envoye au numero: 49929598", "code":200 }

ROUTE: /Client/Debiter
PAYLOAD:
{"token":"wvctd0oV0WMrtd2DoostT0EjLBrwPswtC75no231XQD0DT1GcL8dT8TezTyeno10MbeM08s7EPtaPWIsBBfrp0zPHr0staMHqr2n","codeTransaction":"B5Q8"}
RESPONSE:
{ "nomPrenomClient":"DAKIA Franck", "NumeroClent":"49929598", "codeEtat":"200", "messageEtat":"Operation effectuee avec succes" }
