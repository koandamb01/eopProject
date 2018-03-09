function formatData(p){
	p = p.replace("(", "", p);
	p = p.replace(")", "", p);
	p = p.replace("-", "", p);
	return p;
}


// List of the course that Buffalo State Offer
var coursesList = [ 

"AAS100", "AAS189", "AAS218", "AAS221", "AAS222", "AAS230", "AAS234", "AAS240", "AAS241", "AAS304", "AAS305", "AAS306", "AAS321", "AAS322", "AAS333", "AAS340", "AAS341", "AAS351", "AAS380", "AAS389", 
"AAS411", "AAS421", "AAS425", "AAS468", "AAS469", "AAS495", "AAS499", "ALT490", "ALT495", "ALT499", "AMT495", "AED100", "AED200", "AED300", "AED301", "AED302", "AED303", "AED304", "AED310", "AED315", 
"AED319", "AED365", "AED398", "AED400", "AED488", "AED495", "AED499", "ANT100", "ANT101", "ANT189", "ANT220", "ANT244", "ANT250", "ANT300", "ANT301", "ANT303", "ANT305", "ANT306", "ANT307", "ANT308", 
"ANT310", "ANT312", "ANT315", "ANT321", "ANT322", "ANT323", "ANT324", "ANT325", "ANT326", "ANT327", "ANT329", "ANT330", "ANT332", "ANT340", "ANT341", "ANT344", "ANT350", "ANT362", "ANT365", "ANT367", 
"ANT370", "ANT377", "ANT380", "ANT381", "ANT383", "ANT385", "ANT388", "ANT389", "ANT400", "ANT405", "ANT411", "ANT412", "ANT415", "ANT418", "ANT488", "ANT498", "ANT499", "ARA101", "ARA102", "ATS320", 
"ATS325", "BIO100", "BIO101", "BIO104", "BIO111", "BIO210", "BIO212", "BIO213", "BIO214", "BIO300", "BIO301", "BIO303", "BIO305", "BIO308", "BIO309", "BIO314", "BIO315", "BIO316", "BIO321", "BIO325", 
"BIO330", "BIO350", "BIO361", "BIO402", "BIO405", "BIO408", "BIO414", "BIO418", "BIO421", "BIO426", "BIO428", "BIO429", "BIO430", "BIO431", "BIO433", "BIO450", "BIO488", "BIO495", "BIO498", "BIO499",
"BME301", "BME302", "BME303", "BME411", "BME415", "BME416", "BME495", "BME499", "BSC101", "BUS116", "BUS117", "BUS189", "BUS201", "BUS212", "BUS300", "BUS305", "BUS312", "BUS313", "BUS320", "BUS321",
"BUS323", "BUS324", "BUS325", "BUS327", "BUS329", "BUS330", "BUS334", "BUS335", "BUS340", "BUS341", "BUS347", "BUS348", "BUS350", "BUS360", "BUS363", "BUS365", "BUS366", "BUS367", "BUS368", "BUS369",
"BUS378", "BUS403", "BUS404", "BUS410", "BUS412", "BUS413", "BUS417", "BUS420", "BUS424", "BUS425", "BUS426", "BUS428", "BUS430", "BUS440", "BUS460", "BUS473", "BUS490", "CEL189", "CEL301", "CEL389",
"CHE100", "CHE101", "CHE102", "CHE111", "CHE112", "CHE114", "CHE201", "CHE202", "CHE203", "CHE204", "CHE300", "CHE301", "CHE305", "CHE306", "CHE307", "CHE308", "CHE310", "CHE315", "CHE321", "CHE322",
"CHE331", "CHE360", "CHE399", "CHE403", "CHE406", "CHE430", "CHE462", "CHE470", "CHE471", "CHE472", "CHE495", "CHE497", "CHE499", "CHI101", "CHI102", "CHI201", "CHI202", "CHI301", "CHI302", "CHI389",

"CIS101", "CIS105", "CIS151", "CIS251", "CIS315", "CIS361", "CIS370", "CIS375", "CIS380", "CIS391", "CIS400", "CIS405", "CIS410", "CIS411", "CIS413", "CIS420", "CIS425", "CIS427", "CIS435", "CIS442",
"CIS470", "CIS471", "CIS473", "CIS475", "CIS478", "CIS488", "CIS490", "CIS495", "CIS499", "COM100", "COM210", "COM215", "COM301", "COM302", "COM303", "COM304", "COM308", "COM310", "COM312", "COM317", 
"COM322", "COM325", "COM327", "COM328", "COM329", "COM335", "COM336", "COM337", "COM338", "COM340", "COM341", "COM342", "COM389", "COM390", "COM392", "COM400", "COM401", "COM405", "COM408", "COM410",
"COM418", "COM428", "COM429", "COM431", "COM432", "COM433", "COM434", "COM450", "COM488", "COM495", "COM499", "CRJ101", "CRJ201", "CRJ202", "CRJ204", "CRJ250", "CRJ301", "CRJ302", "CRJ303", "CRJ305", 
"CRJ306", "CRJ307", "CRJ308", "CRJ310", "CRJ315", "CRJ317", "CRJ320", "CRJ355", "CRJ402", "CRJ404", "CRJ406", "CRJ408", "CRJ409", "CRJ410", "CRJ420", "CRJ425", "CRJ430", "CRJ440", "CRJ450", "CRJ455", 
"CRJ470", "CRJ485", "CRJ488", "CRJ495", "CRJ499", "CRS201", "CRS205", "CRS302", "CRS303", "CRS304", "CRS320", "CRS389", "CRS435", "CTE100", "CTE200", "CTE301", "CTE302", "CTE306", "CTE311", "CTE350", 
"CTE402", "CTE404", "CTE413", "CTE415", "CTE421", "CTE435", "CTE479", "CTE489", "CTE492", "CTE495", "CTE497", "CTE499", "CWP099", "CWP101", "CWP102", "DAN200", "DAN201", "DAN214", "DAN220", "DAN224", 
"DAN230", "DAN234", "DAN244", "DAN250", "DAN301", "DAN302", "DAN303", "DAN310", "DAN312", "DAN320", "DAN324", "DAN330", "DAN340", "DAN350", "DAN401", "DAN450", "DAN495", "DAN499", "DES101", "DES102", 
"DES103", "DES104", "DES114", "DES190", "DES220", "DES230", "DES242", "DES250", "DES270", "DES271", "DES277",


"DES307", "DES312", "DES314", "DES320", "DES321", "DES329", "DES330", "DES331", "DES336", "DES337", "DES338", "DES342", "DES344", "DES350", "DES351", "DES370", "DES374", "DES377", "DES378", "DES379",
"DES380", "DES382", "DES389", "DES414", "DES421", "DES431", "DES444", "DES451", "DES472", "DES473", "DES475", "DES478", "DES479", "DES480", "DES488", "DES489", "DES495", "DES499", "DMP221", "DMP222",
"DMP321", "DMP331", "DMP341", "DMP350", "DMP351", "DMP352", "DMP360", "DMP431", "DMP450", "DMP491", "DMP495", "DMP499", "ECO101", "ECO103", "ECO104", "ECO189", "ECO201", "ECO202", "ECO220", "ECO300",
"ECO301", "ECO302", "ECO304", "ECO305", "ECO307", "ECO308", "ECO312", "ECO320", "ECO325", "ECO350", "ECO355", "ECO360", "ECO389", "ECO401", "ECO403", "ECO404", "ECO405", "ECO407", "ECO411", "ECO412",
"ECO424", "ECO488", "ECO490", "ECO493", "ECO495", "ECO498", "ECO499", "EDU121", "EDU201", "EDU211", "EDU220", "EDU310", "EDU311", "EDU312", "EDU313", "EDU316", "EDU326", "EDU327", "EDU329", "EDU375",
"EDU400", "EDU401", "EDU402", "EDU404", "EDU410", "EDU411", "EDU416", "EDU417", "EDU499", "ELS099", "ENG130", "ENG131", "ENG151", "ENG160", "ENG190", "ENG200", "ENG201", "ENG205", "ENG206", "ENG210",
"ENG211", "ENG212", "ENG220", "ENG221", "ENG230", "ENG231", "ENG240", "ENG241", "ENG243", "ENG245", "ENG247", "ENG252", "ENG253", "ENG255", "ENG260", "ENG266", "ENG300", "ENG301", "ENG303", "ENG304",
"ENG305", "ENG306", "ENG307", "ENG308", "ENG309", "ENG311", "ENG313", "ENG314", "ENG315", "ENG316", "ENG317", "ENG320", "ENG322", "ENG325", "ENG327", "ENG330", "ENG331", "ENG332", "ENG335", "ENG337",
"ENG340", "ENG345", "ENG346", "ENG350", "ENG351", "ENG353", "ENG354", "ENG356", "ENG357", "ENG361", "ENG370", "ENG380", "ENG385", "ENG390", "ENG402", "ENG403", "ENG404", "ENG410", "ENG415", "ENG416", 
"ENG417", "ENG418", "ENG419", "ENG420", "ENG421", "ENG422", "ENG441", "ENG442", "ENG443", "ENG444", "ENG445", "ENG450", "ENG451", "ENG452", "ENG454", "ENG455", "ENG461", "ENG463", "ENG464", "ENG465",
"ENG488", "ENG490", "ENG491", "ENG495", "ENG499", "ENS100", "ENS300", "ENT100", "ENT101", "ENT102", "ENT104", "ENT202", "ENT300", "ENT301", "ENT302", "ENT303", "ENT311", "ENT312", "ENT314", "ENT321",
"ENT330", "ENT331", "ENT332", "ENT335", "ENT341", "ENT342", "ENT345", "ENT346", "ENT351", "ENT352", "ENT361", "ENT365", "ENT371", "ENT392", "ENT401", "ENT402", "ENT404", "ENT411", "ENT414", "ENT420",
"ENT421", "ENT422", "ENT433", "ENT441", "ENT442", "ENT445", "ENT461", "ENT462", "ENT465", "ENT466", "ENT471", "ENT472", "ENT481", "ENT482", "ENT491", "ENT495", "ENT497", "ENT499", "ESL303", "ESL389",


"ESL401", "ESL403", "ESL404", "ESL407", "ESL408", "EWS094", "EWS095", "EWS096", "EWS097", "EWS098", "EWS099", "EXE100", "EXE245", "EXE360", "EXE361", "EXE362", "EXE363", "EXE364", "EXE365", "EXE366",
"EXE367", "EXE368", "EXE371", "EXE372", "EXE375", "EXE389", "EXE420", "EXE495", "EXE499", "FAR100", "FAR101", "FAR102", "FAR103", "FAR104", "FAR105", "FAR189", "FAR210", "FAR220", "FAR230", "FAR240",
"FAR250", "FAR251", "FAR300", "FAR311", "FAR312", "FAR313", "FAR316", "FAR321", "FAR322", "FAR323", "FAR325", "FAR328", "FAR331", "FAR332", "FAR333", "FAR335", "FAR341", "FAR342", "FAR343", "FAR345",
"FAR346", "FAR351", "FAR352", "FAR353", "FAR354", "FAR355", "FAR356", "FAR357", "FAR358", "FAR359", "FAR361", "FAR362", "FAR363", "FAR364", "FAR365", "FAR366", "FAR367", "FAR369", "FAR371", "FAR372",
"FAR373", "FAR374", "FAR375", "FAR376", "FAR377", "FAR380", "FAR382", "FAR385", "FAR389", "FAR400", "FAR410", "FAR420", "FAR430", "FAR440", "FAR469", "FAR470", "FAR471", "FAR488", "FAR495", "FAR497",
"FAR499", "FCS301", "FCS302", "FCS303", "FCS404", "FCS415", "FCS416", "FCS499", "FIN110", "FIN189", "FIN314", "FIN345", "FIN370", "FIN389", "FIN400", "FIN414", "FIN415", "FIN416", "FIN417", "FIN418",
"FIN419", "FIN499", "FLE200", "FLE201", "FLE240", "FLE300", "FLE316", "FLE340", "FLE401", "FLE403", "FLE405", "FLE406", "FLE407", "FLE408", "FLE497", "FLE499", "FOR122", "FOR312", "FOR412", "FOR414",
"FOR416", "FOR495", "FOR497", "FOR499", "FRE101", "FRE102", "FRE201", "FRE202", "FRE203", "FRE204", "FRE301", "FRE302", "FRE305", "FRE306", "FRE307", "FRE308", "FRE309", "FRE310", "FRE321", "FRE331",
"FRE341", "FRE389", "FRE402", "FRE412", "FRE415", "FRE416", "FRE420", "FRE435", "FRE440", "FRE455", "FRE460", "FRE495", "FRE496", "FRE497", "FRE499", "FTT100", "FTT109", "FTT110", "FTT150", "FTT200",
"FTT206", "FTT208", "FTT224", "FTT250", "FTT300", "FTT303", "FTT304", "FTT306", "FTT308", "FTT310", "FTT324", "FTT326", "FTT327", "FTT328", "FTT329", "FTT348", "FTT349", "FTT350", "FTT355", "FTT358",
"FTT359", "FTT365", "FTT410", "FTT412", "FTT413", "FTT450", "FTT451", "FTT452", "FTT455", "FTT461", "FTT475", "FTT488", "FTT495", "FTT497", "FTT499", "GEG101", "GEG102", "GEG120", "GEG199", "GEG206", 
"GEG241", "GEG300", "GEG303", "GEG305", "GEG307", "GEG309", "GEG310", "GEG316", "GEG325", "GEG330", "GEG345", "GEG359", "GEG360", "GEG362", "GEG364", "GEG365", "GEG375", "GEG382", "GEG383", "GEG384", 
"GEG385", "GEG386", "GEG390", "GEG396", "GEG405", "GEG409", "GEG415", "GEG416", "GEG418", "GEG419", "GEG421", "GEG423", "GEG425", "GEG427", "GEG428", "GEG429", "GEG430", "GEG461", "GEG478", "GEG480",
"GEG485", "GEG488", "GEG495", "GEG499", "GER101", "GER102", "GER201", "GER202", "GER301", "GER302", "GER337", "GER389", "GER495", "GER497", "GES101", "GES102", "GES103", "GES111", "GES131", "GES201",


"GES223", "GES224", "GES232", "GES241", "GES300", "GES301", "GES302", "GES303", "GES306", "GES307", "GES310", "GES314", "GES315", "GES331", "GES332", "GES335", "GES339", "GES350", "GES360", "GES401",
"GES403", "GES405", "GES408", "GES409", "GES410", "GES431", "GES450", "GES452", "GES460", "GES465", "GES488", "GES495", "GES498", "GES499", "GRK101", "GRK102", "GST100", "HEW204", "HEW225", "HEW279",
"HEW301", "HEW302", "HEW305", "HEW307", "HEW308", "HEW310", "HEW312", "HEW320", "HEW327", "HEW330", "HEW345", "HEW380", "HEW389", "HEW401", "HEW411", "HEW412", "HEW425", "HEW488", "HEW495", "HEW497",
"HEW499", "HIS106", "HIS107", "HIS115", "HIS116", "HIS117", "HIS120", "HIS189", "HIS204", "HIS210", "HIS230", "HIS231", "HIS300", "HIS302", "HIS304", "HIS306", "HIS307", "HIS308", "HIS309", "HIS310",
"HIS311", "HIS312", "HIS313", "HIS314", "HIS315", "HIS316", "HIS317", "HIS318", "HIS319", "HIS320", "HIS321", "HIS322", "HIS323", "HIS324", "HIS326", "HIS327", "HIS328", "HIS330", "HIS331", "HIS332", 
"HIS334", "HIS335", "HIS336", "HIS337", "HIS338", "HIS340", "HIS341", "HIS342", "HIS344", "HIS345", "HIS350", "HIS351", "HIS354", "HIS355", "HIS356", "HIS357", "HIS358", "HIS359", "HIS360", "HIS361", 
"HIS362", "HIS363", "HIS365", "HIS366", "HIS367", "HIS370", "HIS371", "HIS372", "HIS373", "HIS375", "HIS379", "HIS380", "HIS381", "HIS382", "HIS383", "HIS385", "HIS386", "HIS389", "HIS400", "HIS401",
"HIS402", "HIS404", "HIS405", 'HIS406', "HIS407", "HIS408", "HIS412", "HIS415", "HIS418", "HIS419", "HIS420", "HIS422", "HIS425", "HIS430", "HIS440", "HIS445", "HIS447", "HIS448", "HIS450", "HIS460", 
"HIS465", "HIS466", "HIS468", "HIS469", "HIS480", "HIS488", "HIS490", "HIS495", "HIS497", "HIS498", "HIS499", "HON100", "HON101", "HON102", "HON103", "HON202", "HON301", "HON309", "HON400", "HON499",
"HPR100", "HPR114", "HPR154", "HPR180", "HPR198", "HPR201", "HPR202", "HPR203", "HPR205", "HPR207", "HPR208", "HPR209", "HPR300", "HPR301", "HPR306", "HPR309", "HPR319", "HPR335", "HPR389", "HPR488", 
"HPR495", "HPR499", "HTR100", "HTR110", "HTR200", "HTR300", "HTR305", "HTR318", "HTR330", "HTR335", "HTR340", "HTR348", "HTR350", "HTR361", "HTR365", "HTR368", "HTR370", "HTR375", "HTR380", "HTR385", 
"HTR389", "HTR390", "HTR400", "HTR408", "HTR418", "HTR455", "HTR468", "HTR470", "HTR480", "HTR485", "HTR495", "HTR499", "HUM100", "HUM200", "HUM495", "HUM499", "IDE101", "IDE103", "IDE104", "IDE151",
"IDE152", "IDE153", "IDE201", "IDE202", "IDE203", "IDE204", "IDE205", "IDE251", "IDE252", "IDE254", "IDE301", "IDE302", "IDE303", "IDE351", "IDE352", "IDE353", "IDE354", "IDE355", "IDE389", "IDE401", 



"IDE403", "IDE451", "IDE488", "IDE499", "INS300", "INS495", "INS497", "INS499", "ITA101", "ITA102", "ITA201", "ITA202", "ITA301", "ITA302", "ITA306", "ITA307", "ITA308", "ITA410", "ITA450", "ITA451",
"ITA499", "LAT101", "LAT102", "LIB100", "LIB300", "LIB495", "LIB499", "MAT097", "MAT098", "MAT103", "MAT114", "MAT121", "MAT122", "MAT124", "MAT126", "MAT127", "MAT161", "MAT162", "MAT163", "MAT164", 
"MAT202", "MAT223", "MAT241", "MAT263", "MAT264", "MAT270", "MAT300", "MAT301", "MAT302", "MAT304", "MAT309", "MAT311", "MAT315", "MAT316", "MAT318", "MAT319", "MAT322", "MAT325", "MAT351", "MAT366",
"MAT370", "MAT381", "MAT382", "MAT383", "MAT390", "MAT401", "MAT404", "MAT411", "MAT417", "MAT418", "MAT431", "MAT461", "MAT471", "MAT481", "MAT484", "MAT490", "MAT491", "MAT495", "MAT499", "MCL100",
"MCL189", "MCL205", "MCL337", "MCL338", "MCL488", "MCL495", "MCL499", "MED200", "MED300", "MED307", "MED308", "MED309", "MED383", "MED406", "MED407", "MED408", "MED499", "MST450", "MST488", "MST495",
"MST498", "MST499", "MUS110", "MUS111", "MUS112", "MUS113", "MUS114", "MUS115", "MUS116", "MUS119", "MUS122", "MUS123", "MUS161", "MUS162", "MUS171", "MUS173", "MUS201", "MUS206", "MUS208", "MUS209", 
"MUS210", "MUS218", "MUS219", "MUS220", "MUS223", "MUS224", "MUS230", "MUS231", "MUS261", "MUS262", "MUS271", "MUS273", "MUS290", "MUS302", "MUS303", "MUS305", "MUS306", "MUS313", "MUS313", "MUS318", 
"MUS319", "MUS321", "MUS322", "MUS323", "MUS326", "MUS330", "MUS331", "MUS333", "MUS334", "MUS335", "MUS337", "MUS338", "MUS339", "MUS341", "MUS345", "MUS346", "MUS347", "MUS349", "MUS351", "MUS353", 
"MUS360", "MUS361", "MUS362", "MUS363", "MUS364", "MUS365", "MUS371", "MUS373", "MUS410", "MUS422", "MUS440", "MUS457", "MUS458", "MUS460", "MUS471", "MUS473", "MUS488", "MUS491", "MUS495", "MUS499",
"NFS100", "NFS102", "NFS105", "NFS108", "NFS110", "NFS111", "NFS200", "NFS210", "NFS211", "NFS230", "NFS280", "NFS300", "NFS302", "NFS310", "NFS311", "NFS315", "NFS316", "NFS330", "NFS334", "NFS389", 
"NFS401", "NFS402", "NFS403", "NFS405", "NFS411", "NFS419", "NFS420", "NFS430", "NFS445", "NFS446", "NFS447", "NFS448", "NFS449", "NFS450", "NFS451", "NFS471", "NFS499", "PAD307", "PAD360", "PAD368",
"PAD370", "PAD389", "PAD390", "PAD435", "PAD488", "PAD495", "PAD499", "PHI101", "PHI102", "PHI103", "PHI107", "PHI110", "PHI111", "PHI204", "PHI207", "PHI210", "PHI300", "PHI301", "PHI302", "PHI304",
"PHI305", "PHI307", "PHI308", "PHI309", "PHI310", "PHI312", "PHI314", "PHI317", "PHI318", "PHI324", "PHI333", "PHI334", "PHI347", "PHI351", "PHI401", "PHI402", "PHI495", "PHI498", "PHI499", "PHY100",
"PHY103", "PHY104", "PHY105", "PHY107", "PHY108", "PHY111", "PHY112", "PHY189", "PHY213", "PHY304", "PHY305", "PHY306", "PHY308", "PHY310", "PHY315", "PHY320", "PHY323", "PHY324", "PHY410", "PHY412", 


"PHY425", "PHY435", "PHY440", "PHY441", "PHY445", "PHY448", "PHY450", "PHY495", "PHY499", "PLN215", "PLN225", "PLN310", "PLN315", "PLN325", "PLN330", "PLN340", "PLN341", "PLN350", "PLN360", "PLN370",
"PLN380", "PLN390", "PLN396", "PLN401", "PLN405", "PLN410", "PLN412", "PLN415", "PLN430", "PLN431", "PLN488", "PLN495", "PLN499", "PSC101", "PSC102", "PSC103", "PSC203", "PSC204", "PSC210", "PSC215",
"PSC218", "PSC225", "PSC230", "PSC240", "PSC250", "PSC302", "PSC305", "PSC306", "PSC308", "PSC309", "PSC310", "PSC311", "PSC312", "PSC313", "PSC315", "PSC316", "PSC317", "PSC318", "PSC319", "PSC320",
"PSC321", "PSC325", "PSC326", "PSC327", "PSC330", "PSC333", "PSC335", "PSC336", "PSC337", "PSC340", "PSC341", "PSC342", "PSC345", "PSC351", "PSC352", "PSC355", "PSC360", "PSC364", "PSC368", "PSC370",
"PSC375", "PSC389", "PSC390", "PSC399", "PSC410", "PSC415", "PSC420", "PSC421", "PSC450", "PSC470", "PSC485", "PSC488", "PSC495", "PSC497", "PSC499", "PSY101", "PSY205", "PSY304", "PSY306", "PSY308",
"PSY311", "PSY321", "PSY325", "PSY327", "PSY330", "PSY340", "PSY355", "PSY356", "PSY357", "PSY365", "PSY367", "PSY370", "PSY375", "PSY376", "PSY381", "PSY382", "PSY383", "PSY384", "PSY387", "PSY388", 
"PSY392", "PSY393", "PSY411", "PSY412", "PSY415", "PSY416", "PSY417", "PSY421", "PSY427", "PSY430", "PSY432", "PSY440", "PSY441", "PSY450", "PSY460", "PSY466", "PSY471", "PSY472", "PSY480", "PSY481", 
"PSY488", "PSY495", "PSY496", "PSY498", "PSY499", "REL104", "REL105", "REL121", "REL205", "REL206", "REL303", "REL306", "REL321", "REL329", "REL332", "REL488", "REL499", "SAF305", "SAF310", "SAF320",
"SAF333", "SAF340", "SAF360", "SAF431", "SAF450", "SAF499", "SCI100", "SCI105", "SCI125", "SCI200", "SCI231", "SCI232", "SCI310", "SCI311", "SCI312", "SCI313", "SCI323", "SCI335", "SCI340", "SCI445",
"SCI495", "SCI499", "SED200", "SED310", "SED401", "SED405", "SED407", "SED408", "SED409", "SED488", "SLP100", "SLP101", "SLP102", "SLP206", "SLP220", "SLP302", "SLP303", "SLP304", "SLP305", "SLP314", 
"SLP328", "SLP329", "SLP400", "SLP401", "SLP405", "SLP411", "SLP412", "SLP424", "SLP428", "SLP429", "SLP495", "SLP497", "SLP499", "SOC100", "SOC199", "SOC208", "SOC212", "SOC240", "SOC250", "SOC300", 
"SOC301", "SOC302", "SOC310", "SOC312", "SOC320", "SOC321", "SOC322", "SOC323", "SOC324", "SOC328", "SOC330", "SOC331", "SOC333", "SOC340", "SOC350", "SOC351", "SOC352", "SOC353", "SOC360", "SOC366", 
"SOC370", "SOC380", "SOC381", "SOC382", "SOC383", "SOC390", "SOC391", "SOC392", "SOC393", "SOC400", "SOC408", "SOC430", "SOC484", "SOC485", "SOC486", "SOC488", "SOC490", "SOC491", "SOC495", "SOC499",


"SPA101", "SPA102", "SPA106", "SPA201", "SPA202", "SPA206", "SPA301", "SPA302", "SPA303", "SPA304", "SPA305", "SPA306", "SPA307", "SPA308", "SPA309", "SPA310", "SPA311", "SPA317", "SPA321", "SPA389", 
"SPA401", "SPA402", "SPA404", "SPA408", "SPA410", "SPA411", "SPA415", "SPA416", "SPA421", "SPA495", "SPA496", "SPA497", "SPA499", "SPC103", "SPC205", "SPC306", "SPC307", "SPC309", "SPC311", "SPC315",
"SPC321", "SPC326", "SPC333", "SPC407", "SPC422", "SPC424", "SPC426", "SPF202", "SPF203", "SPF221", "SPF222", "SPF225", "SPF302", "SPF303", "SPF311", "SPF319", "SPF345", "SPF346", "SPF353", "SPF366",
"SPF389", "SPF403", "SPF495", "SPF497", "SPF499", "SSE200", "SSE303", "SSE309", "SSE350", "SSE363", "SSE370", "SSE402", "SSE404", "SSE407", "SSE409", "SSE410", "SSE488", "SSE495", "SSE497", "SSE499",
"SWK105", "SWK220", "SWK301", "SWK307", "SWK308", "SWK310", "SWK317", "SWK320", "SWK321", "SWK335", "SWK345", "SWK346", "SWK419", "SWK422", "SWK423", "SWK424", "SWK425", "SWK429", "SWK485", "SWK493",
"SWK494", "SWK495", "SWK496", "SWK497", "SWK499", "TEC101", "TEC150", "TEC200", "TEC201", "TEC260", "TEC301", "TEC302", "TEC311", "TEC312", "TEC313", "TEC314", "TEC319", "TEC321", "TEC323", "TEC351",
"TEC400", "TEC402", "TEC403", "TEC404", "TEC405", "TEC465", "TEC488", "TEC495", "TEC497", "TEC499", "TED100", "TED101", "TED123", "TED253", "TED300", "TED320", "TED349", "TED360", "TED361", "TED450", 
"TED451", "TED453", "TED495", "TED497", "TED499", "TFA189", "TFA201", "TFA301", "TFA350", "TFA389", "TFA401", "TFA420", "TFA450", "TFA460", "TFA480", "TFA481", "TFA488", "TFA495", "TFA499", "THA106",
"THA107", "THA189", "THA200", "THA216", "THA218", "THA222", "THA226", "THA227", "THA230", "THA231", "THA232", "THA234", "THA235", "THA236", "THA245", "THA300", "THA316", "THA317", "THA318", "THA325", 
"THA327", "THA328", "THA329", "THA330", "THA331", "THA332", "THA333", "THA334", "THA335", "THA336", "THA337", "THA338", "THA340", "THA345", "THA346", "THA348", "THA350", "THA359", "THA370", "THA400", 
"THA416", "THA418", "THA421", "THA426", "THA435", "THA437", "THA450", "THA459", "THA470", "THA488", "THA495", "THA499", "UNC100", "UNC101", "UNC111", "UNC120", "UNC150", "UNC189", "WGS101", "WGS212",
"WGS488", "WGS495", "WGS499"]

// Validating the input firstname
function validateFirstName(){
	var first = document.forms['myForm']['firstname'].value;
	var letters = /^[A-Za-z '.-]+$/;

	if(first.length == 0){
		document.forms['myForm']['firstname'].style.border = "1px solid red";
		document.forms['myForm']['firstname'].focus;
		document.getElementById("fnameErr").innerHTML = "* First Name required";
		document.getElementById("fnameErr").style.display = 'block';
		document.getElementById("fnameErr").style.color = 'red';
		document.getElementById("fnameErr").style.textAlign = 'right';
		document.getElementById("fnameErr").style.float = 'right';
		return false;
	}
	else if(first.match(letters)){
		document.forms['myForm']['firstname'].style.border = "1px solid #ccc";
		document.getElementById("fnameErr").style.display = 'none';
		return true;
	}else{
		document.forms['myForm']['firstname'].style.border = "1px solid red";
		document.forms['myForm']['firstname'].focus;
		document.getElementById("fnameErr").innerHTML = "* Alphabet characters only";
		document.getElementById("fnameErr").style.display = 'block';
		document.getElementById("fnameErr").style.color = 'red';
		document.getElementById("fnameErr").style.textAlign = 'right';
		document.getElementById("fnameErr").style.float = 'right';
		return false;
	}
}


// Validating the input lastname
function validateLastName(){
	var last = document.forms['myForm']['lastname'].value;
	var letters = /^[A-Za-z '.-]+$/;
	
	
	if(last.length == 0){
		document.forms['myForm']['lastname'].style.border = "1px solid red";
		document.forms['myForm']['lastname'].focus;
		document.getElementById("lnameErr").innerHTML = "* Last Name required";
		document.getElementById("lnameErr").style.display = 'block';
		document.getElementById("lnameErr").style.color = 'red';
		document.getElementById("lnameErr").style.textAlign = 'right';
		document.getElementById("lnameErr").style.float = 'right';
		return false;
	}
	else if(last.match(letters)){
		document.forms['myForm']['lastname'].style.border = "1px solid #ccc";
		document.getElementById("lnameErr").style.display = 'none';
		return true;
	}else{
		document.forms['myForm']['lastname'].style.border = "1px solid red";
		document.forms['myForm']['lastname'].focus;
		document.getElementById("lnameErr").innerHTML = "* Alphabet characters only";
		document.getElementById("lnameErr").style.display = 'block';
		document.getElementById("lnameErr").style.color = 'red';
		document.getElementById("lnameErr").style.textAlign = 'right';
		document.getElementById("lnameErr").style.float = 'right';
		return false;
	}
}


// Validating the academic dropdown
function validateAcademic(){
	var acad = document.forms['myForm']['academic'].value;
	
	if(acad.length == 0){
		document.forms['myForm']['academic'].style.border = "1px solid red";
		document.forms['myForm']['academic'].focus;
		document.getElementById("academicErr").innerHTML = "* Academmic Year required";
		document.getElementById("academicErr").style.display = 'block';
		document.getElementById("academicErr").style.color = 'red';
		document.getElementById("academicErr").style.textAlign = 'right';
		document.getElementById("academicErr").style.float = 'right';
		return false;
	}
	else{
		document.forms['myForm']['academic'].style.border = "1px solid #ccc";
		document.getElementById("academicErr").style.display = 'none';
		return true;
	}
}



// Validation the email
function validateEmail(){
	var email = document.forms['myForm']['email'].value;
	var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	
	document.forms['myForm']['email'].style.background = "#fff";
	if(email.length == 0){
		document.forms['myForm']['email'].style.border = "1px solid red";
		document.forms['myForm']['email'].focus;
		document.getElementById("emailErr").innerHTML = "* Email required";
		document.getElementById("emailErr").style.display = 'block';
		document.getElementById("emailErr").style.color = 'red';
		document.getElementById("emailErr").style.textAlign = 'right';
		document.getElementById("emailErr").style.float = 'right';
		return false;
	}
	else if(email.match(mailFormat)){
		document.forms['myForm']['email'].style.border = "1px solid #ccc";
		document.getElementById("emailErr").style.display = 'none';
		return true;
	}else{
		document.forms['myForm']['email'].style.border = "1px solid red";
		document.forms['myForm']['email'].focus;
		document.getElementById("emailErr").innerHTML = "* Invalid email address!";
		document.getElementById("emailErr").style.display = 'block';
		document.getElementById("emailErr").style.color = 'red';
		document.getElementById("emailErr").style.textAlign = 'right';
		document.getElementById("emailErr").style.float = 'right';
		return false;
	}
}


// Validation the Password
function validatePassword(){
	var pass = document.forms['myForm']['password'].value;
	var pattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
	
	document.forms['myForm']['password'].style.background = "#fff";
	if(pass.length == 0){
		document.forms['myForm']['password'].style.border = "1px solid red";
		document.forms['myForm']['password'].focus;
		document.getElementById("passwordErr").innerHTML = "* Password required";
		document.getElementById("passwordErr").style.display = 'block';
		document.getElementById("passwordErr").style.color = 'red';
		document.getElementById("passwordErr").style.textAlign = 'right';
		document.getElementById("passwordErr").style.float = 'right';
		return false;
	}
	else if(pass.match(pattern)){
		document.forms['myForm']['password'].style.border = "1px solid #ccc";
		document.getElementById("passwordErr").style.display = 'none';
		return true;
	}else{
		document.forms['myForm']['password'].style.border = "1px solid red";
		document.forms['myForm']['password'].focus;
		document.getElementById("passwordErr").innerHTML = "* Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
		document.getElementById("passwordErr").style.display = 'block';
		document.getElementById("passwordErr").style.color = 'red';
		document.getElementById("passwordErr").style.textAlign = 'right';
		document.getElementById("passwordErr").style.float = 'right';
		return false;
	}
}


// Validating the counselor dropdown
function validateCounselor(){
	var counselor = document.forms['myForm']['counselor'].value;
	var checkbox = document.querySelector("input[name=iseop]");

	if(checkbox.checked){
		// do nothing
		return true;
	}
	else{
		if(counselor.length == 0){
			document.forms['myForm']['counselor'].style.border = "1px solid red";
			document.forms['myForm']['counselor'].focus;
			document.getElementById("counselorErr").innerHTML = "* Counselor required";
			document.getElementById("counselorErr").style.display = 'block';
			document.getElementById("counselorErr").style.color = 'red';
			document.getElementById("counselorErr").style.textAlign = 'right';
			document.getElementById("counselorErr").style.float = 'right';
			return false;
		}
		else{
			document.forms['myForm']['counselor'].style.border = "1px solid #ccc";
			document.getElementById("counselorErr").style.display = 'none';
			return true;
		}
	}
}


// Validating the Mentor dropdown
function validateMentor(){
	var mentor = document.forms['myForm']['mentor'].value;
	
	if(mentor.length == 0){
		document.forms['myForm']['mentor'].style.border = "1px solid red";
		document.forms['myForm']['mentor'].focus;
		document.getElementById("mentorErr").innerHTML = "* Mentor required";
		document.getElementById("mentorErr").style.display = 'block';
		document.getElementById("mentorErr").style.color = 'red';
		document.getElementById("mentorErr").style.textAlign = 'right';
		document.getElementById("mentorErr").style.float = 'right';
		return false;
	}
	else{
		document.forms['myForm']['mentor'].style.border = "1px solid #ccc";
		document.getElementById("mentorErr").style.display = 'none';
		return true;
	}
}


// Validating the Session Type dropdown
function validateSessionType(){
	var sessionType = document.forms['myForm']['sessionType'].value;
	
	if(sessionType.length == 0){
		document.forms['myForm']['sessionType'].style.border = "1px solid red";
		document.forms['myForm']['sessionType'].focus;
		document.getElementById("sessionTypeErr").innerHTML = "* Session Type required";
		document.getElementById("sessionTypeErr").style.display = 'block';
		document.getElementById("sessionTypeErr").style.color = 'red';
		document.getElementById("sessionTypeErr").style.textAlign = 'right';
		document.getElementById("sessionTypeErr").style.float = 'right';
		return false;
	}
	else{
		document.forms['myForm']['sessionType'].style.border = "1px solid #ccc";
		document.getElementById("sessionTypeErr").style.display = 'none';
		return true;
	}
}


// Validating the Session Start dropdown
function validateSessionStart(){
	var sessionStart = document.forms['myForm']['sessionStart'].value;
	
	if(sessionStart.length == 0){
		document.forms['myForm']['sessionStart'].style.border = "1px solid red";
		document.forms['myForm']['sessionStart'].focus;
		document.getElementById("sessionStartErr").innerHTML = "* Session Start Time required";
		document.getElementById("sessionStartErr").style.display = 'block';
		document.getElementById("sessionStartErr").style.color = 'red';
		document.getElementById("sessionStartErr").style.textAlign = 'right';
		document.getElementById("sessionStartErr").style.float = 'right';
		return false;
	}
	else{
		document.forms['myForm']['sessionStart'].style.border = "1px solid #ccc";
		document.getElementById("sessionStartErr").style.display = 'none';
		return true;
	}
}


// Validating the Session End dropdown
function validateSessionEnd(){
	var sessionEnd = document.forms['myForm']['sessionEnd'].value;
	
	if(sessionEnd.length == 0){
		document.forms['myForm']['sessionEnd'].style.border = "1px solid red";
		document.forms['myForm']['sessionEnd'].focus;
		document.getElementById("sessionEndErr").innerHTML = "* Session End Time required";
		document.getElementById("sessionEndErr").style.display = 'block';
		document.getElementById("sessionEndErr").style.color = 'red';
		document.getElementById("sessionEndErr").style.textAlign = 'right';
		document.getElementById("sessionEndErr").style.float = 'right';
		return false;
	}
	else{
		document.forms['myForm']['sessionEnd'].style.border = "1px solid #ccc";
		document.getElementById("sessionEndErr").style.display = 'none';
		console.log(sessionEnd);
		return true;
	}
}



// Validating the Session Course Name
function validateCourse(){

	var course = document.forms['myForm']['sessionCourse'].value.toUpperCase();

	var courseFormat = /^[A-Za-z]{3}[0-9]{3}/;

	if(course.length == 0){
		document.forms['myForm']['sessionCourse'].style.border = "1px solid red";
		document.forms['myForm']['sessionCourse'].focus;
		document.getElementById("sessionCourseErr").innerHTML = "* Course Name required";
		document.getElementById("sessionCourseErr").style.display = 'block';
		document.getElementById("sessionCourseErr").style.color = 'red';
		document.getElementById("sessionCourseErr").style.textAlign = 'right';
		document.getElementById("sessionCourseErr").style.float = 'right';
		return false;
	}
	else if(course.match(courseFormat)){

		for(let i = 0; i < coursesList.length; i++){
			if(course == coursesList[i]){
				document.forms['myForm']['sessionCourse'].style.border = "1px solid #ccc";
				document.getElementById("sessionCourseErr").style.display = 'none';
				return true;
			}
		}
		document.forms['myForm']['sessionCourse'].style.border = "1px solid red";
		document.forms['myForm']['sessionCourse'].focus;
		document.getElementById("sessionCourseErr").innerHTML = "* Invalid Course Name!";
		document.getElementById("sessionCourseErr").style.display = 'block';
		document.getElementById("sessionCourseErr").style.color = 'red';
		document.getElementById("sessionCourseErr").style.textAlign = 'right';
		document.getElementById("sessionCourseErr").style.float = 'right';
		return false;
		
	}else{
		document.forms['myForm']['sessionCourse'].style.border = "1px solid red";
		document.forms['myForm']['sessionCourse'].focus;
		document.getElementById("sessionCourseErr").innerHTML = "* Course Must be three letters and Three Numbers code without space: ABC123";
		document.getElementById("sessionCourseErr").style.display = 'block';
		document.getElementById("sessionCourseErr").style.color = 'red';
		document.getElementById("sessionCourseErr").style.textAlign = 'right';
		document.getElementById("sessionCourseErr").style.float = 'right';
		return false;
	}
}


// Validating the Title Type dropdown
function validateTitle(){
	var title = document.forms['myForm']['tilte'].value;
	
	if(title.length == 0){
		document.forms['myForm']['title'].style.border = "1px solid red";
		document.forms['myForm']['title'].focus;
		document.getElementById("titleErr").innerHTML = "* Title Type required";
		document.getElementById("titleErr").style.display = 'block';
		document.getElementById("titleErr").style.color = 'red';
		document.getElementById("titleErr").style.textAlign = 'right';
		document.getElementById("titleErr").style.float = 'right';
		return false;
	}
	else{
		document.forms['myForm']['title'].style.border = "1px solid #ccc";
		document.getElementById("titleErr").style.display = 'none';
		return true;
	}
}

// Valida

function validateSemester(){
	var semester = document.forms['myForm']['semester'];

	for(let x = 0; x < semester.length; x++){
		if(semester[x].checked){
			document.getElementById("semesterErr").style.display = 'none';
			return true;
		}
	}
	document.forms['myForm']['semester'].focus;
	document.getElementById("semesterErr").innerHTML = "* Choose a Semester";
	document.getElementById("semesterErr").style.display = 'block';
	document.getElementById("semesterErr").style.color = 'red';
	document.getElementById("semesterErr").style.textAlign = 'right';
	return false;
}


function validateForms(x){
	var error = 0;

if(x == 'm'){
	if(!validateFirstName()) {error = 1;}
	if(!validateLastName()) {error = 1;}
	if(!validateAcademic()) {error = 1;}
	if(!validateEmail()) {error = 1;}
}

if(x == 's'){
	if(!validateFirstName()) {error = 1;}
	if(!validateLastName()) {error = 1;}
	if(!validateAcademic()) {error = 1;}
	if(!validateEmail()) {error = 1;}
	if(!validateCounselor()) {error = 1;}
	if(!validateMentor()) {error = 1;}
	if(!validateSessionType()) {error = 1;}
	if(!validateSessionStart()) {error = 1;}
	if(!validateSessionEnd()) {error = 1;}
	if(!validateCourse()) {error = 1;}
	if(!validateSemester()) {error = 1;}
}

if(x == 'r'){
	if(!validateFirstName()) {error = 1;}
	if(!validateLastName()) {error = 1;}
	if(!validateEmail()) {error = 1;}
	if(!validateTitle()){error = 1;}
	if(!validatePassword()){error = 1;}
}
	
	if (error == 1){return false}
	return true;
}
