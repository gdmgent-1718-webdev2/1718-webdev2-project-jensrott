import { Component, OnInit, Input } from '@angular/core';

import { ProductService } from '../../../core/services/product.service';
import { Product } from '../../../core/models/product';

import { UserService } from '../../../core/services/user.service';
import { User } from '../../../core/models/user';

import { BidService } from '../../../core/services/bid.service';
import { Bid } from '../../../core/models/bid';

import { CategoryService } from '../../../core/services/category.service';
import { Category } from '../../../core/models/category';

import { AuctionService } from '../../../core/services/auction.service';
import { Auction } from '../../../core/models/auction';

import { Observable } from 'rxjs/Observable';

@Component({
  selector: 'app-auctions-list',
  templateUrl: './auctions-list.component.html',
  styleUrls: ['./auctions-list.component.scss']
})
export class AuctionsListComponent implements OnInit {
  @Input() selectedCategory: string = 'xx';

  public products: Array<Product>;
  public users: Array<User>;
  public bids: Array<Bid>;
  public categories: Array<Category>;
  public auctions: Array<Auction>;
  public selectedAuction: Auction;

  constructor(
    private productService: ProductService,
    private userService: UserService,
    private bidService: BidService,
    private categoryService: CategoryService,
    private auctionService: AuctionService
  ) {}

  ngOnInit() {
    this.getProducts();
    this.getUsers();
    this.getBids();
    this.getCategories();
    this.getAuctions();
  }

  getProducts() {
    this.productService
      .getProducts()
      .subscribe(product => (this.products = product));
  }

  getUsers() {
    this.userService.getUsers().subscribe(user => (this.users = user));
  }
  getBids() {
    this.bidService.getBids().subscribe(bid => (this.bids = bid));
  }
  getCategories() {
    this.categoryService
      .getCategories()
      .subscribe(category => (this.categories = category));
  }

  getAuctions() {
    this.auctionService
      .getAuctions()
      .subscribe(auction => (this.auctions = auction));
  }

  onSelect(auction: Auction) {
    this.selectedAuction = auction;
    console.log(this.selectedAuction);
  }
}
