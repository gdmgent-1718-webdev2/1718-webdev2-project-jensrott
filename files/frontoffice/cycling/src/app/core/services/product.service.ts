import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';

import { Observable } from 'rxjs/Observable';

import { Product } from '../models/product';
import { environment } from '../../../environments/environment';

@Injectable()
export class ProductService {

  private _apiEndPointGet = environment.CyclingAPI.url + environment.CyclingAPI.productsEndPoints.get;
  private _apiEndPointGetSpecific = environment.CyclingAPI.url + environment.CyclingAPI.productsEndPoints.getspecific;
  private _apiEndPointPost = environment.CyclingAPI.url + environment.CyclingAPI.productsEndPoints.post;

/** End Points for oauth-based authorization */
 private oauthUrl = environment.Cycling.url +  '/oauth/token' ;
/** private usersUrl = environment.CyclingAPI.url + environment.CyclingAPI ; */

  httpOptionsProduct = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
      'enctype': 'multipart/form-data',
      'X-Requested-With': 'XMLHttpRequest',
      /**'Accept': 'application/json'  /** from authorization tutorial */
    })
  };



  constructor(private _httpClient: HttpClient) { }

  getAccessToken() {
    let headers = new HttpHeaders({
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    });

    let postData = {
        grant_type: 'password',
        client_id: 2,
        client_secret: 'xjlfjd',
        username: 'password',
        scope: ''
    };
    return this._httpClient.post(this.oauthUrl, JSON.stringify(postData), {
        headers: headers
    });

  }

  getProducts(): Observable<Array<Product>> {
    return this._httpClient.get<Array<Product>>(this._apiEndPointGet);
  }

  getProductsById(id: number): Observable<Product> {
      const url = `${this._apiEndPointGetSpecific}${id}`;
      return this._httpClient.get<Product>(`${ url }`);
  }

  addProduct(product: Product) {
      /** console.log(product); */
      return this._httpClient.post<Product>(this._apiEndPointPost, product, this.httpOptionsProduct);
  }

}
