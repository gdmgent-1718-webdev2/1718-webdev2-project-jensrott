import { Component, OnInit } from '@angular/core';
import { Product } from '../../../core/models/product';
import { ProductService } from '../../../core/services/product.service';
import { AuthenticationService } from '../../../core/services/authentication.service';
import { CategoryService } from '../../../core/services/category.service';
import { Category } from '../../../core/models/category';

@Component({
  selector: 'app-offer-page',
  templateUrl: './offer-page.component.html',
  styleUrls: ['./offer-page.component.scss']
})
export class OfferPageComponent implements OnInit {

  public selectedCategory: string ;
  public selectedCategory_id: string;

  private succesMessage: string = '';
  private product: Product   = {  // temporarily limited to a subset of the fields
   id: 1,
   name: '',
   description: '',
   picture: 'picture1',
   start_of_bid_period: '2018-01-01',
   end_of_bid_period: '2018-12-31',
    user_id: 1,
    // created_at: '',
    // updated_at: '',
   category_id: 5,
   };
  public newProduct: Product;
  public products: Array<Product>;
  public categories: Array<Category>;
  submitted = false;
  onSubmit() {this.submitted = true; } // Tracking the state of the form

  constructor(
    private productService: ProductService,
    private categoryService: CategoryService,
    private authenticationService: AuthenticationService,
  ) {}


  ngOnInit() {
      this.getProducts();
      this.getCategories();

  //  this.getSpecificProduct();
  }

  getProducts() {
    this.productService.getProducts()
    .subscribe(product => this.products = product);
  }

  getSpecificProduct() {
   this.productService.getProductsById(1)
   .subscribe(newProduct =>
      this.product = newProduct);
  }

  getCategories() {
    this.categoryService.getCategories()
    .subscribe(category => this.categories = category);
  }

  // Call our api through the service

  addProduct() {
    this.product.user_id = this.authenticationService.getCurrentUserId();
    console.log(this.product);
    console.log(this.selectedCategory);
    this.productService.addProduct(this.product)
    .subscribe(res => {
      console.log(res);
      this.newProduct = res;
      this.succesMessage = 'Veiling is succesvol aangemaakt!';
      console.log(this.newProduct);
    });
  }
}
