import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';

import {Router} from '@angular/router';

import { environment } from '../../../environments/environment';


@Injectable()
export class AuthenticationService {

  private _apiEndPointLogin = environment.CyclingAPI.url + environment.CyclingAPI.authEndPoints.login;
  private _apiEndPointRegister = environment.CyclingAPI.url + environment.CyclingAPI.authEndPoints.register;

  constructor(private http: HttpClient) { }



  login(email: string, password: string) {
    return this.http.post<any>(this._apiEndPointLogin, { email: email, password: password})
    .map(user => {
      // login successfull if there is a jwt token in the response
      if (user && user.access_token) {
        // store user details and jwt token in local storage to keep user logged in between page refreshes
        localStorage.setItem('currentUser', JSON.stringify(user)); // Token + current User details are stored as a JSON string
        }
      return user;

    });
  }

  logout() {
    // remove user from local storage to log user out
    localStorage.removeItem('currentUser');
  }


  getCurrentUserId() {
    // Function which allows to retrieve at every moment the id of the current authorized user
    let currentUserId = 0;
    if (localStorage.getItem('currentUser')) {
      // LoggedIn, so current User Id can be retrieved
      currentUserId = JSON.parse(localStorage.getItem('currentUser')).user.id;
      console.log('retrieving current user id');
      console.log(currentUserId);
      return currentUserId;
    }
  }
}
