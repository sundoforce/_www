/// <reference types="./types" />
export declare class MenuItem {
    element: HTMLElement;
    menuItem: IMenuItem;
    constructor(vditor: IVditor, menuItem: IMenuItem);
    bindEvent(vditor: IVditor, replace?: boolean): void;
}
