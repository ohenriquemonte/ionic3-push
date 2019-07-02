import { Component } from '@angular/core';
import { Platform } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';

import { TabsPage } from '../pages/tabs/tabs';

import { Firebase } from "@ionic-native/firebase";
@Component({
	templateUrl: 'app.html'
})
export class MyApp {
	rootPage: any = TabsPage;

	constructor(platform: Platform, statusBar: StatusBar, splashScreen: SplashScreen, private firebase: Firebase) {
		platform.ready().then(() => {
			// Okay, so the platform is ready and our plugins are available.
			// Here you can do any higher level native things you might need.
			statusBar.styleDefault();
			splashScreen.hide();
			this.solicitarTokenDoFirebase();
		});
	}

	solicitarTokenDoFirebase() {
 
		this.firebase.getToken()
		  .then(token => {
			console.log("firebase token recebido", token);
			this.enviarTokenParaOservidor(token);
			this.iniciarListenerDeNotificacoes();
		  }) // save the token server-side and use it to push notifications to this device
		  .catch(error => {
			console.error('Error getting token', error)
		  });
	 
	  }
	 
	  iniciarListenerDeNotificacoes() {
	 
		this.firebase.onNotificationOpen().subscribe((notification: any) => {
		  console.log(notification);
		})
	 
	  }
	 
	  enviarTokenParaOservidor(token) {
	 	console.log('token', token);
		//lógica para enviar o token para o seu servidor através da sua api
	  }
}
