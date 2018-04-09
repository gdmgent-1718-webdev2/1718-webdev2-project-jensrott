import { Component, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {
@Output() sidebarToggle = new EventEmitter();

  // Todo add logic to add the class active page to the header when clicked on page.
  allListItems: any;
  constructor() { }

  ngOnInit() {
  }

  sidebarOpen() {
    this.sidebarToggle.emit();
  }

}
